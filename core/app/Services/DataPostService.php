<?php


namespace App\Services;

use App\Models\DataPost;

class DataPostService
{

    public function store(string $name, string $data, int $value)
    {
        try {
            $dataPost = DataPost::create([
                'name' => $name,
                'user_id' => (new \App\CPU\Helpers)->UserId(),
                'data' => $data,
                'value' => $value,
            ]);
            return $dataPost;
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }
}
