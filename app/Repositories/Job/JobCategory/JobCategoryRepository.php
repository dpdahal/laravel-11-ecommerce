<?php

namespace App\Repositories\Job\JobCategory;

use App\Helpers\SearchData;
use App\Models\Job\JobCategory;
use App\Traits\General;
use Illuminate\Support\Facades\Request;

class JobCategoryRepository extends SearchData implements JobCategoryInterface
{
    use General;

    protected JobCategory $categoryModel;


    public function __construct(JobCategory $model)
    {
        parent::__construct($model);
        $this->categoryModel = $model;
    }

    public function getAll($criteria = 'search', $searchAbleField = [])
    {
        return $this->filter_by_criteria($criteria, $searchAbleField);
    }

    public function paginate($perPage = null)
    {
        return $this->model->paginate($perPage);
    }

    public function getById($criteria)
    {
        return $this->model->findOrFail($criteria);
    }

    private function updateFile($id, $data)
    {
        return $this->model->findOrFail($id)->update($data);
    }


    public function insert(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        $lastInsertId = $this->model->create($data);
        $tableName = $this->model->getTable();
        $filePath = 'uploads/' . $tableName;
        $fileData['image'] = $this->customFileUpload($filePath);
        if ($lastInsertId) {
            $id = $lastInsertId->id;
            $this->updateFile($id, $fileData);
            return true;
        } else {
            return false;
        }
    }

    public function update(array $data, $id)
    {
        $data['user_id'] = auth()->user()->id;
        if ($this->model->findOrFail($id)->update($data)) {
            return true;
        } else {
            return false;
        }
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

        if ($this->model->findOrFail($id)->delete()) {
            return true;
        } else {
            return false;
        }
    }


    public function getParentData()
    {
        return $this->categoryModel->whereNull('parent_id');
    }


    public function getNotSelected($id)
    {
        return $this->categoryModel->whereNull('parent_id')->where('id', '!=', $id)->get();
    }

    public function addChildPage(array $data)
    {

        $mainId = $data['main_category_id'];
        $data['user_id'] = auth()->user()->id;
        $data['parent_id'] = $mainId;
        $lastInsertId = $this->categoryModel->create($data);
        $tableName = $this->categoryModel->getTable();
        $filePath = 'uploads/' . $tableName;
        $fileData['image'] = $this->customFileUpload($filePath);
        if ($lastInsertId) {
            $id = $lastInsertId->id;
            $this->updateFile($id, $fileData);
            return true;
        } else {
            return false;
        }


    }


}


