<?php


namespace App\Http\Controllers\File;

use App\Http\Controllers\File\BaseController;
use App\Http\Requests\File\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $result = $this->service->store($data);
        return response()->json($result);
    }
}
