<?php

class Video
{
    private string $title;
    private bool $available;
    private array $rating;

    public function __construct(string $title, bool $available, array $rating)
    {
        $this->title = $title;
        $this->available = $available;
        $this->rating = $rating;
    }

    public function setAvailable(bool $available): void
    {
        $this->available = $available;
    }

    public function setRating(int $rating): void
    {
        $this->rating[] = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAvailability(): string
    {
        return ($this->available === true) ? "available" : "not available";
    }

    public function getRating(): int
    {

        return array_sum($this->rating)/count($this->rating);
    }
}