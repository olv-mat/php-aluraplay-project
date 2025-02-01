<?php

namespace Project\MyPlayer\Controller;

use Project\MyPlayer\Model\Helper\FlashMessageTrait;
use Project\MyPlayer\Model\Repository\VideoRepository;
use Project\MyPlayer\Model\Entity\Video;
use League\Plates\Engine;
use finfo;

class VideoFormInsertController implements Controller
{   
    use FlashMessageTrait;

    private VideoRepository $repository;
    private string $requestMethod;
    private Engine $template;

    public function __construct(VideoRepository $repository, string $requestMethod, Engine $template)
    {
        $this->repository = $repository;
        $this->requestMethod = $requestMethod;
        $this->template = $template;
    }

    public function requestProcessing(): void
    {
        if ($this->requestMethod == "POST") {
            $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
            $title = filter_input(INPUT_POST, "title");
            if (!$url || !$title) {
                $this->addErrorMessage("Título ou URL inválidos");
                header("Location: /insert-video");
                exit();
            }

            $video = new Video(null, $url, $title, null);
            if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {

                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $fileType = $finfo->file($_FILES["image"]["tmp_name"]);

                if (str_starts_with($fileType, "image/")) {
                    $file = uniqid("upload_") . "_" . pathinfo($_FILES["image"]["name"], PATHINFO_BASENAME);
                    move_uploaded_file(
                        $_FILES["image"]["tmp_name"],
                        __DIR__ . "/../../public/img/uploads/" .  $file
                    );
                    $video->setImagePath($file);
                }
            }
            $result = $this->repository->insertVideo($video);

            if (!$result) {
                $this->addErrorMessage("Erro cadastrar novo vídeo");
                header("Location: /insert-video");
                exit();
            }
            $this->addSuccessMessage("Vídeo cadastrado");
            header("Location: /");
            exit();
        }

        echo $this->template->render("video_form_insert");
    }
}
