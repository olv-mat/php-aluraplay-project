<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use Project\AluraPlay\Helper\FlashMessageTrait;
use PDO;

class RemoveBannerController implements Controller
{
    use FlashMessageTrait;

    private VideoRepository $repository;
    private string $requestMethod;

    public function __construct(VideoRepository $repository, string $requestMethod)
    {
        $this->repository = $repository;
        $this->requestMethod = $requestMethod;
    }

    public function requestProcessing(): void
    {   
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $result = $this->repository->deleteVideoBanner($id);

        if (!$result) {
            $this->addErrorMessage("Erro ao remover a capa do vídeo, tente novamente mais tarde");
            header("Location: /");
            exit();
        }
        $this->addSuccessMessage("Capa do vídeo removida com sucesso");
        header("Location: /");
        exit();
          
    }
}
