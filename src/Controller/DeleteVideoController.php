<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use PDO;

class DeleteVideoController implements Controller
{  

    private VideoRepository $repository;
    
    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function requestProcessing(): void
    {   
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $result = $this->repository->deleteVideo($id);

        if (!$result) {
            header("Location: /?success=0");
        }
        header("Location: /?success=1");
          
    }
}
