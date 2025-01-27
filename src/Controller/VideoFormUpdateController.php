<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use Project\AluraPlay\Helper\{
    FlashMessageTrait, HtmlRendererTrait
};
use PDO;

class VideoFormUpdateController implements Controller
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

            $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
            $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
            $title = filter_input(INPUT_POST, "titulo");

            if (!$id || !$url || !$title) {
                $this->addErrorMessage("Título ou URL inválidos");
                header("Location: /");
                exit();   
            }

            $video = new Video($id, $url, $title);
            $result = $this->repository->updateVideo($video);

            if (!$result) {
                $this->addErrorMessage("Erro ao editar o vídeo, tente novamente mais tarde");
                header("Location: /");
                exit(); 
            }
            $this->addSuccessMessage("Vídeo atualizado com sucesso");
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
