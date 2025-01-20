<?php

namespace Project\AluraPlay\Repository;

use Project\AluraPlay\Entity\Video;
use PDO;
use PDOStatement;

class VideoRepository
{
    private $conn;
    
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function insertVideo(Video $video): bool
    {
    
        $query = "INSERT INTO videos (url, title, image_path) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $video->getUrl());
        $stmt->bindValue(2, $video->getTitle());
        $stmt->bindValue(3, $video->getImagePath());
        return $stmt->execute();
    }

    public function deleteVideo(int $id): bool
    {
        $query = "DELETE FROM videos WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteVideoBanner(int $id): bool
    {
        $query = "UPDATE videos SET image_path = NULL WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }

    public function updateVideo(Video $video): bool
    {
        $query = "UPDATE videos SET url = ?, title = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $video->getUrl());
        $stmt->bindValue(2, $video->getTitle());
        $stmt->bindValue(3, $video->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function selectVideos(): array
    {
        $query = "SELECT * FROM videos";
        $videos = $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
        $videosArray = array_map(function($video) {
            return new Video(
                $video["id"],
                $video["url"],
                $video["title"],
                $video["image_path"],
            );
        }, $videos);
        return $videosArray;
    }

    public function selectVideo(int $id): Video
    {
        $query = "SELECT * FROM videos WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $video = $stmt->fetch(PDO::FETCH_ASSOC);
        $videoObj = new Video(
            $video["id"],
            $video["url"],
            $video["title"],
            $video["image_path"],
        );
        return $videoObj;
    }

}
