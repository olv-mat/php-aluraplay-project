<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use PDO;

class VideoFormUpdateController implements Controller
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
                header("Location: /?success=0");
                exit();   
            }

            $video = new Video($id, $url, $title);
            $result = $this->repository->updateVideo($video);

            if (!$result) {
                header("Location: /?success=0");
                exit(); 
            }
            header("Location: /?success=1");
        }

        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $video = $this->repository->selectVideo($id);

        require_once __DIR__ . "/../../views/video_form_update.php";
    }
}
