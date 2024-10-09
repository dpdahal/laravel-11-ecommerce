<?php

namespace App\Repositories\Job\JobCategory;

interface JobCategoryInterface
{
    public function getAll($criteria = 'search', $searchAbleField = []);

    public function getParentData();

    public function paginate($perPage = null);

    public function getById($criteria);

    public function insert(array $data);

    public function update(array $data, $id);

    public function delete($id);


    public function getNotSelected($id);


    public function addChildPage(array $data);
}
