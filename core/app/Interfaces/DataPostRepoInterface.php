<?php


namespace App\Interfaces;


interface DataPostRepoInterface
{
    public function store(array $datas);
    public function index($perPage);

}
