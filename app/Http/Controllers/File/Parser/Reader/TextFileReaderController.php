<?php


namespace App\Http\Controllers\File\Parser\Reader;


class TextFileReaderController
{
    protected $filepath;

    protected function readFile(): \Generator
    {
        $handle = fopen($this->filepath, "r");

        while (!feof($handle)) {
            yield trim(fgets($handle));
        }

        fclose($handle);
    }
}
