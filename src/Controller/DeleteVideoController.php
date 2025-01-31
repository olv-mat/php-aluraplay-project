<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use League\Plates\Engine;
use PDO;

class DeleteVideoController implements Controller
{  

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
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $result = $this->repository->deleteVideo($id);

        if (!$result) {
            $_SESSION["error_message"] = "Erro ao deletar o vídeo";
            header("Location: /");
            exit();
        }
        $_SESSION["success_message"] = "Vídeo deleteado com sucesso";
        header("Location: /");
        exit();
          
    }
}
