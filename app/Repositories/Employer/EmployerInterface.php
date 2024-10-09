<?php

namespace App\Repositories\Employer;

interface EmployerInterface
{

    public function all();

    public function getById($id);

    public function insert($data);

    public function update($id, $data);


    public function delete($id);

    public function updateStatusupdateStatus($id, $status);


}
