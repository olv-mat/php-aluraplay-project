<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use PDO;

class VideoFormInsertController implements Controller
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
            $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
            $title = filter_input(INPUT_POST, "titulo");
            if (!$url || !$title) {
                header("Location: /?success=0");
                exit();
            }

            $video = new Video(null, $url, $title, null);
            if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
                $file = $_FILES["image"]["name"];
                move_uploaded_file(
                    $_FILES["image"]["tmp_name"],
                    __DIR__ . "/../../public/img/uploads/" .  $file
                );
                $video->setImagePath($file);
            }
            $result = $this->repository->insertVideo($video);

            if (!$result) {
                header("Location: /?success=0");
                exit();
            }
            header("Location: /?success=1");
        }

        require_once __DIR__ . "/../../views/video_form_insert.php";
    }
}
