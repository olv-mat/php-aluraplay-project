<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use PDO;

class NewVideoJsonController implements Controller
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
        $request = file_get_contents("php://input");
        $videoData = json_decode($request, true);
        $video = new Video(null, $videoData["url"], $videoData["title"], null);
        $result = $this->repository->insertVideo($video);
        http_response_code($result ? 201 : 500);
    }

}
