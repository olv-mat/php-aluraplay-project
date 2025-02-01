<?php

namespace Project\MyPlayer\Controller;

use Project\MyPlayer\Model\Helper\FlashMessageTrait;
use Project\MyPlayer\Model\Repository\VideoRepository;
use League\Plates\Engine;

class RemoveBannerController implements Controller
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
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $result = $this->repository->deleteVideoBanner($id);

        if (!$result) {
            $this->addErrorMessage("Erro ao deletar a capa do vídeo");
            header("Location: /");
            exit();
        }
        $this->addSuccessMessage("Capa deletada");
        header("Location: /");
        exit();
          
    }
}
