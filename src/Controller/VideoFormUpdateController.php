<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use PDO;

class VideoFormUpdateController extends ControllerWithHtml implements Controller
{   

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

            $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
            $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
            $title = filter_input(INPUT_POST, "titulo");

            if (!$id || !$url || !$title) {
                $_SESSION["error_message"] = "Título ou URL inválidos";
                header("Location: /");
                exit();   
            }

            $video = new Video($id, $url, $title);
            $result = $this->repository->updateVideo($video);

            if (!$result) {
                $_SESSION["error_message"] = "Erro ao editar o vídeo, tente novamente mais tarde";
                header("Location: /");
                exit(); 
            }
            $_SESSION["success_message"] = "Vídeo atualizado com sucesso";
            header("Location: /");
            exit();
        }

        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $video = $this->repository->selectVideo($id);
        $context = [
            "video" => $video,
        ];
        
        echo $this->renderTemplate("video_form_update.php", $context);

    }
}
