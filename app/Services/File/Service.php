<?php


namespace App\Services\File;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data): array
    {
        $filename = Carbon::now()->timestamp.'_'.$data['file']->getClientOriginalName();
        try {
            Storage::disk('local')->putFileAs('/file', $data['file'], $filename);
        }catch (\Exception $ex){
            return ['status' => false, 'msg' => $ex->getMessage()];
        }
        return ['status' => true, 'msg' => ''];
    }
}
