<?php


namespace App\Http\Controllers\File\Parser;


use App\Http\Controllers\File\Parser\Reader\TextFileReaderController;

class TextFileParseController extends TextFileReaderController
{
    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
    }

    public function toArrayByPregMatch(string $pregMatch): array
    {
        $words = [];
        $iterations = $this->readFile();
        foreach ($iterations as $iteration) {
            preg_match_all($pregMatch, $iteration, $matches);
            if (count($matches)) {
                $words = array_merge($words, $matches[0]);
            }
        }

        return $words;
    }
}
