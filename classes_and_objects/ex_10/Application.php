<?php

class Application
{
    private ?VideoStore $list = null;

    function run()
    {
        while (true) {
            echo "------------------------------------------------" . PHP_EOL;
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";
            echo "------------------------------------------------" . PHP_EOL;

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies(): void
    {
        $title = readline("Enter title: ");
        $available = true;
        $rating = (int) readline("Enter rating (1-10): ");
        if ($this->list === null)
        {
            $this->list = new VideoStore([new Video($title, $available, [$rating])]);
        } else {
            $this->list->addVideo(new Video($title, $available, [$rating]));
        }
    }

    private function rentVideo(): void
    {
        $movieNumber = (int) readline("Enter video number: ");
        $movie = $this->list->getVideoList()[$movieNumber];
        /** @var Video $movie */
        if ($movie->getAvailability() === "available")
        {
            $movie->setAvailable(false);
            echo "You have rented out {$movie->getTitle()}." . PHP_EOL;
        } else {
            echo "This movie is not available!" . PHP_EOL;
        }
    }

    private function returnVideo(): void
    {
        $movieNumber = (int) readline("Enter video number: ");
        $movie = $this->list->getVideoList()[$movieNumber];
        /** @var Video $movie */
        $newRating = (int) readline("Enter movie {$movie->getTitle()} rating (1-10): ");
        if ($movie->getAvailability() === "not available")
        {
            $movie->setAvailable(true);
            $movie->setRating($newRating);
        } else {
            echo "This movie was not rented" . PHP_EOL;
        }
    }

    private function listInventory(): void
    {
        echo "------------------------------------------------" . PHP_EOL;
        foreach ($this->list->getVideoList() as $key => $video)
        {
            /** @var Video $video */
            echo "{$key}. {$video->getTitle()}, average rating {$video->getRating()} | {$video->getAvailability()} " . PHP_EOL;   // todo kā pareizi šo sadalīt, lai neiet pāri līnijai? ar enter vienkārši pārlcec uz jaunu līniju
        }
        echo "------------------------------------------------" . PHP_EOL;
    }
}