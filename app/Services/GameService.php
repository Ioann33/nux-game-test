<?php

namespace App\Services;

class GameService
{
    protected int $randomNumber;

    public function __construct()
    {
        $this->randomNumber = rand(1,1000);
    }

    public function getRandomNumber(): int
    {
        return $this->randomNumber;
    }

    public function getResult(): string
    {
        return $this->randomNumber % 2 === 0 ? 'Win' : 'Lose';
    }

    public function getWinAmount(string $result): float
    {
        if ($result === 'Lose') {
            return 0;
        }

        if ($this->randomNumber > 900) {
            return 0.7 * $this->randomNumber;
        } elseif ($this->randomNumber > 600) {
            return 0.5 * $this->randomNumber;
        } elseif ($this->randomNumber > 300) {
            return 0.3 * $this->randomNumber;
        } else {
            return 0.1 * $this->randomNumber;
        }
    }
}
