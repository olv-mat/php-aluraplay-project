<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use PDO;

class VideoListingController implements Controller
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
        $videos = $this->repository->selectVideos();
        
        require_once __DIR__ . "/../../views/video_listing.php";
    }
}
