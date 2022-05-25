<?php


namespace App\Http\Controllers\File;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function __invoke()
    {
        $files = Storage::disk('local')->files('file');
        if (!empty($files)) {
            foreach ($files as &$file) {
                $file = trim($file, 'file/');
            }
        }
        return $files;
    }
}
