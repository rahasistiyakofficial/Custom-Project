<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataPostRequest;
use App\Http\Resources\DataPostResource;
use App\Interfaces\DataPostRepoInterface;
use Illuminate\Http\Request;


class DataController extends Controller
{

    //Istiyak's Custom Pattern..Data Stores with Service Class & Fetch Using Collection
    //For POST:Repository + Service + CustomRequest_Class
    //For GET:Repository + Resource

    private $Repository;

    public function __construct(DataPostRepoInterface $Repository)
    {
        $this->Repository = $Repository;
    }

    public function store(DataPostRequest $request)
    {
        $datas = $request->validated();
        return response()->json(['data' => $this->Repository->store($datas)], 200);
    }


    public function index(Request $request)
    {
        $data = $this->Repository->index($request->paginate);
        return DataPostResource::collection($data);
    }
}
