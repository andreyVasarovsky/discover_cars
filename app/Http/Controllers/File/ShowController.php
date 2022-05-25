<?php


namespace App\Http\Controllers\File;


use App\Http\Controllers\Controller;
use App\Http\Controllers\File\Parser\TextFileParseController;
use App\Http\Controllers\File\Statistic\WordCalculationController;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{
    const MIN_WORD_LENGTH = 4;
    const TOP_ROW_QTY = 10;

    public function __invoke($filename)
    {
        $filepath = Storage::disk('local')->path('file/' . $filename);
        if (empty($filepath)) {
            return ['status' => false, 'message' => 'Unknown file path', 'data' => []];
        }
        $words = (new TextFileParseController($filepath))->toArrayByPregMatch('/(\S{' . self::MIN_WORD_LENGTH . ',})/i');
        $statistics = (new WordCalculationController($words))->getStatistics(self::TOP_ROW_QTY);

        return ['status' => true, 'message' => 'Calculated', 'data' => $statistics];
    }
}
