<?php

namespace App\Repositories\Job\Skills;

interface SkillsInterface
{

    public function all();

    public function store($data);

    public function show($id);

    public function update($data, $id);

    public function delete($id);
}
