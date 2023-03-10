<?php

namespace App\Repositories;

interface ITagRepository
{
    public function all();

    public function create(array $data);

    public function find($id);

    public function update($id, array $data);

    public function delete($id);

    public function deleteTag($id);
}