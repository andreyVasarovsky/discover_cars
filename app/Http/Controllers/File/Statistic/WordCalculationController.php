<?php


namespace App\Http\Controllers\File\Statistic;


class WordCalculationController
{
    private $words;
    private $topLimit;

    public function __construct(array $words)
    {
        $this->words = $words;
    }

    public function getStatistics($topLimit = false): array
    {
        $this->topLimit = $topLimit;
        return $this->calculatePercents();
    }

    private function calculatePercents(): array
    {
        $percents = [];
        $topWords = $this->findTopWords();
        if (!empty($topWords)) {
            $totalQty = array_sum($topWords);
            foreach ($topWords as $word => $qty) {
                $percents[$word] = ($qty / $totalQty) * 100;
            }
        }

        return $percents;
    }

    private function findTopWords(): array
    {
        $found = [];
        if (!empty($this->words)) {
            foreach ($this->words as $word) {
                if (!isset($found[$word])) {
                    $found[$word] = 1;
                } else {
                    $found[$word]++;
                }
            }
        }
        arsort($found);
        return (!empty($this->topLimit)) ? array_slice($found, 0, $this->topLimit) : $found;
    }
}
