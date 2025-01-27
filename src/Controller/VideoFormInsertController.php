<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use Project\AluraPlay\Helper\{
    FlashMessageTrait, HtmlRendererTrait
};
use PDO;
use finfo;

class VideoFormInsertController implements Controller
{   
    use FlashMessageTrait;
    use HtmlRendererTrait;

    private VideoRepository $repository;
    private string $requestMethod;

    public function __construct(VideoRepository $repository, string $requestMethod)
    {
        $this->repository = $repository;
        $this->requestMethod = $requestMethod;
    }

    public function requestProcessing(): void
    {
        if ($this->requestMethod == "POST") {
            $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
            $title = filter_input(INPUT_POST, "titulo");
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
                $this->addErrorMessage("Erro cadastrar novo vídeo, tente novamente mais tarde");
                header("Location: /insert-video");
                exit();
            }
            $this->addSuccessMessage("Vídeo cadastrado com sucesso");
            header("Location: /");
            exit();
        }

        echo $this->renderTemplate("video_form_insert.php");
    }
}
