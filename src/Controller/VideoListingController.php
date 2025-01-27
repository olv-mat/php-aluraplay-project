<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use Project\AluraPlay\Helper\HtmlRendererTrait;
use PDO;

class VideoListingController implements Controller
{
    use HtmlRendererTrait;

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
        $context = [
            "videos" => $videos,
        ];
        
        echo $this->renderTemplate("video_listing.php", $context);
    }
}
