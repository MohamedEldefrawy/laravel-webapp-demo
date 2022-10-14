<?php

namespace App\Repository\Contracts;

interface RepositoryInterface
{
    public function get_all();

    public function get($id);

    public function create($model);

    public function delete($id);

    public function update($id, $model);
}
