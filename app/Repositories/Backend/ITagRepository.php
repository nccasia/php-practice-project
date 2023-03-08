<?php

namespace App\Repositories\Backend;

use App\Repositories\IBaseRepository;

interface ITagRepository extends IBaseRepository
{
    public function store(array $data);
    public function show($id);
    public function update($id, array $data);
    public function delete($id);
}
