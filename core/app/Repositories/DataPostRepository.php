<?php


namespace App\Repositories;


use App\Interfaces\DataPostRepoInterface;
use App\Models\DataPost;
use App\Services\DataPostService;

class DataPostRepository implements DataPostRepoInterface
{
    protected $service;

    public function __construct(DataPostService $service)
    {
        $this->service = $service;
    }

    public function store(array $datas)
    {
     return $this->service->store($datas['name'], $datas['data'], $datas['value']);
    }
    public function index($perPage)
    {
        return DataPost::with('user')->paginate($perPage);
    }
}
