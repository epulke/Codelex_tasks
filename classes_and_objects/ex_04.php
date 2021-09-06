<?php

class Movie {
    private string $title;
    private string $studio;
    protected string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }


    public function getStudio(): string
    {
        return $this->studio;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

}

class Library {
    private array $movies = [];

    public function addMovieToLibrary(Movie $movie) {
        $this->movies[] = $movie;
    }

    public function getPGMovies(): array
    {
        $pgMovies = [];
        foreach ($this->movies as $movie) {
            if ($movie->getRating() === "PG") {
                $pgMovies[] = $movie;
            }
        }
        return $pgMovies;
    }

    public function printPGMovies(): string
    {
        foreach ($this->getPGMovies() as $movie) {
            return "{$movie->getTitle()}, {$movie->getStudio()}, {$movie->getRating()}." . PHP_EOL;
        }
    }
}

$casinoRoyale = new Movie("Casino Royale", "Eon Productions", "PG13");
$glass = new Movie("Glass", "Buena Vista International", "PG13");
$spiderMan = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG");

$library = new Library();
$library->addMovieToLibrary($casinoRoyale);
$library->addMovieToLibrary($glass);
$library->addMovieToLibrary($spiderMan);

echo $library->printPGMovies();