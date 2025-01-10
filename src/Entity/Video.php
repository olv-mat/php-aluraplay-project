<?php

namespace Project\AluraPlay\Entity;

class Video
{
    private ?int $id;
    private string $url;
    private string $title;

    public function __construct(?int $id, string $url, string $title)
    {
        $this->id = $id;
        $this->setUrl($url);
        $this->title = $title;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        if (is_null($this->id)) {
            $this->id = $id;
        }
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)){
            throw new \InvalidArgumentException();
        }
        $this->url = $url;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
