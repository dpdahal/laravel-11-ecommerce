<?php

namespace App\Repositories\Blogs;

interface BlogsInterface
{

    public function getAll();

    public function paginate($perPage = null);

    public function getById($criteria);

    public function insert(array $data);

    public function update(array $data,$id);

    public function delete($id);


    public function getAllCategory();


}
