<?php

namespace App\Repositories\Job;

interface JobInterface
{
    public function all();

    public function storeJob(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);

    public function getJobCategory();

    public function getJobType();

    public function getJobLevel();

    public function getJobSkill();

    public function getJobEducation();


    public function getCompany();

    public function getExperience();

    public function clearAttributeByCriteria($id,$tableName);


}
