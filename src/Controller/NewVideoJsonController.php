<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use League\Plates\Engine;
use PDO;

class NewVideoJsonController implements Controller
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
        $request = file_get_contents("php://input");
        $videoData = json_decode($request, true);
        $video = new Video(null, $videoData["url"], $videoData["title"], null);
        $result = $this->repository->insertVideo($video);
        http_response_code($result ? 201 : 500);
    }

}
