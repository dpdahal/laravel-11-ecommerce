<?php

namespace App\Repositories\Blogs\Category;

interface BlogCategoryInterface
{
    public function getAll();

    public function getParentData();


    public function getById($criteria);

    public function insert(array $data);

    public function update(array $data, $id);

    public function delete($id);


    public function getNotSelected($id);


}
