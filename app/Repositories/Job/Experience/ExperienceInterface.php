<?php

namespace App\Repositories\Job\Experience;

interface ExperienceInterface
{
    public function all();

    public function store($data);

    public function show($id);

    public function update($data, $id);

    public function delete($id);

}
