<?php

class VideoStore
{
    private array $videoList;

    public function __construct(array $videoList)
    {
        foreach ($videoList as $video)
        {
            $this->addVideo($video);
        }
    }

    public function addVideo(Video $video)
    {
        $this->videoList[] = $video;
    }

    public function getVideoList(): array
    {
        return $this->videoList;
    }

}