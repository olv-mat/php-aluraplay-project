<?php

namespace Project\MyPlayer\Controller;

use Project\MyPlayer\Model\Helper\FlashMessageTrait;
use Project\MyPlayer\Model\Repository\VideoRepository;
use Project\MyPlayer\Model\Entity\Video;
use League\Plates\Engine;

class VideoFormUpdateController implements Controller
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

            $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
            $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
            $title = filter_input(INPUT_POST, "title");

            if (!$id || !$url || !$title) {
                $this->addErrorMessage("Título ou URL inválidos");
                header("Location: /");
                exit();   
            }

            $video = new Video($id, $url, $title, null);
            $result = $this->repository->updateVideo($video);

            if (!$result) {
                $this->addErrorMessage("Erro ao editar o vídeo");
                header("Location: /");
                exit(); 
            }
            $this->addSuccessMessage("Vídeo editado");
            header("Location: /");
            exit();
        }

        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $video = $this->repository->selectVideo($id);
        $context = [
            "video" => $video,
        ];
        
        echo $this->template->render("video_form_update", $context);

    }
}
