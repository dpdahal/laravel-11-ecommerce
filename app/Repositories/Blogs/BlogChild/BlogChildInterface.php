<?php

namespace App\Repositories\Blogs\BlogChild;

interface BlogChildInterface
{

    public function all($pid);

    public function get($id);

    public function insert(array $data);

    public function update(array $data, $id);

}
