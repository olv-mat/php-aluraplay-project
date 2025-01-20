<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use PDO;

class RemoveBannerController implements Controller
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
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $result = $this->repository->deleteVideoBanner($id);

        if (!$result) {
            header("Location: /?success=0");
        }
        header("Location: /?success=1");
          
    }
}
