<?php

namespace App\Repositories\Job\Education;

interface EducationLevelInterface
{
    public function all();

    public function store($data);

    public function show($id);

    public function update($data, $id);

    public function delete($id);

}
