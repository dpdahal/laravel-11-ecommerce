<?php

namespace App\Repositories\Blogs;

use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogPage;
use App\Traits\General;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class BlogsRepository implements BlogsInterface
{
    use General;

    protected $model;

    public function __construct(Blog $model)
    {

        $this->model = $model;

    }

    private function updateFile($id, $data)
    {
        return $this->model->findOrFail($id)->update($data);

    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function paginate($perPage = null)
    {
        return $this->model->paginate($perPage);
    }

    public function getById($criteria)
    {
        return $this->model->findOrFail($criteria);
    }

    public function insert(array $data)
    {
        $data['user_id'] = auth()->id();
        if (!empty($data['categories'])) {
            $categoryIds = $data['categories'];
            unset($data['categories']);
            $data['slug'] = Str::slug($data['title']);
            $data['is_commentable'] = $data['is_commentable'] ?? false;
            if ($this->model->create($data)) {
                $post = $this->model->latest()->first();
                $post->postCategory()->attach($categoryIds);
                $tableName = $this->model->getTable();
                $lastId = $this->model->latest()->first()->id;
                $filePath = 'uploads/' . $tableName;
                $fileData['image'] = $this->customFileUpload($filePath);
                $this->updateFile($lastId, $fileData);
                return true;
            } else {
                return false;
            }
        } else {
            $data['slug'] = Str::slug($data['title']);
            if ($this->model->create($data)) {
                $tableName = $this->model->getTable();
                $lastId = $this->model->latest()->first()->id;
                $filePath = 'uploads/' . $tableName;
                $fileData['image'] = $this->customFileUpload($filePath);
                $this->updateFile($lastId, $fileData);
                return true;
            } else {
                return false;
            }
        }

    }

    public function update(array $data, $id)
    {
        $categoryIds = $data['category'] ?? [];
        unset($data['category']);
        if ($this->model->findOrFail($id)->update($data)) {
            $post = $this->model->findOrFail($id);
            $post->postCategory()->sync($categoryIds);
            return true;
        } else {
            return false;
        }

    }

    private function deleteChildPageCkeditorImage($id)
    {
        $findData = BlogPage::where('blog_id', $id)->get();
        foreach ($findData as $item) {
            $description = $item->description;
            $arrayDescription = explode('src="', $description);
            $http_s = "";
            if (Request::isSecure()) {
                $http_s .= 'https:';
            } else {
                $http_s .= 'http:';
            }
            $imageUrlsDescription = [];
            foreach ($arrayDescription as $value) {
                preg_match('/' . $http_s . '\/\/[^"\']+/', $value, $matches);
                if (!empty($matches[0])) {
                    $imageUrlsDescription[] = $matches[0];
                }
            }

            foreach ($imageUrlsDescription as $value) {
                $imagePath = parse_url($value, PHP_URL_PATH);
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath));
                }
            }

            $excerpt = $item->excerpt;
            $array = explode('src="', $excerpt);
            $imageUrls = [];
            foreach ($array as $value) {
                preg_match('/' . $http_s . '\/\/[^"\']+/', $value, $matches);
                if (!empty($matches[0])) {
                    $imageUrls[] = $matches[0];
                }
            }

            foreach ($imageUrls as $value) {
                $imagePath = parse_url($value, PHP_URL_PATH);
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath));
                }
            }

            $realPath = $item->image;
            $filePath = public_path($realPath);
            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);
            }


        }

        return true;

    }

    public function delete($id)
    {

        $this->deleteChildPageCkeditorImage($id);

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


    public function getAllCategory()
    {
        return BlogCategory::all();
    }

}

