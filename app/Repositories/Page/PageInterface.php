<?php

namespace App\Repositories\Page;

interface PageInterface
{

    public function getAllMenu();

    public function all();

    public function get($id);

    public function insert(array $data);

    public function update(array $data, $id);

    public function delete($id);


}
