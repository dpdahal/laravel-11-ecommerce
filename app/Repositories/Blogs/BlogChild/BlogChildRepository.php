<?php

namespace App\Repositories\Blogs\BlogChild;

use App\Models\Blog\BlogPage;
use Illuminate\Support\Facades\Request;

use App\Traits\General;

class BlogChildRepository implements BlogChildInterface
{
    use General;

    private BlogPage $model;

    public function __construct(BlogPage $model)
    {
        $this->model = $model;
    }

    public function all($pid)
    {
        return $this->model->where('blog_id', $pid)->get();
    }


    public function get($id)
    {
        return $this->model->findOrFail($id);
    }

    private function updateChildPageFile($id, $data)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function insert(array $data)
    {
        $lastInsertId = $this->model->create($data);
        $tableName = $this->model->getTable();
        $filePath = 'uploads/' . $tableName;
        $fileData['image'] = $this->customFileUpload($filePath);
        if ($lastInsertId) {
            $id = $lastInsertId->id;
            $this->updateChildPageFile($id, $fileData);
            return true;
        } else {
            return false;
        }

    }

    public function update(array $data, $id)
    {
        return $this->updateChildPageFile($id, $data);

    }

    public function delete($id)
    {
        $http_s = "";

        if (Request::isSecure()) {
            $http_s .= 'https:';
        } else {
            $http_s .= 'http:';
        }

        $post = $this->model->findOrFail($id);

        $image = $post->excerpt;
        $array = explode('src="', $image);

        $imageUrls = [];
        foreach ($array as $item) {
            preg_match('/' . $http_s . '\/\/[^"\']+/', $item, $matches);
            if (!empty($matches[0])) {
                $imageUrls[] = $matches[0];
            }
        }

        foreach ($imageUrls as $item) {
            $imagePath = parse_url($item, PHP_URL_PATH);
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
        }

        $descriptionImage = $post->description;
        $arrayDescription = explode('src="', $descriptionImage);
        $imageUrlsDescription = [];
        foreach ($arrayDescription as $item) {
            preg_match('/' . $http_s . '\/\/[^"\']+/', $item, $matches);
            if (!empty($matches[0])) {
                $imageUrlsDescription[] = $matches[0];
            }
        }
        foreach ($imageUrlsDescription as $item) {
            $imagePath = parse_url($item, PHP_URL_PATH);
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
        }

        $realPath = $post->image;
        $filePath = public_path($realPath);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }


        if ($post->delete()) {
            return true;
        } else {
            return false;
        }


    }


}
