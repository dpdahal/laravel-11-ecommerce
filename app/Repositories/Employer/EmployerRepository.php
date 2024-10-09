<?php

namespace App\Repositories\Employer;

use App\Models\User\Employer;
use App\Models\User\User;
use App\Notifications\EmployerCreatedNotification;
use App\Traits\General;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class EmployerRepository implements EmployerInterface
{
    use General;

    private $model;

    public function __construct(Employer $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $authUser = auth()->user();
        if ($authUser->account_type->name == 'employer') {
            return $this->model->where('user_id', $authUser->id)->get();
        } else {
            return $this->model->all();
        }
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    private function updateFile($id, $data)
    {
        return $this->model->findOrFail($id)->update($data);

    }

    public function insert($data)
    {
        try {
            $data['company_slug'] = Str::slug($data['company_slug']);
            $data['user_id'] = (int)auth()->user()->id;
            $company = $this->model->create($data);
            $employer = auth()->user();
//            $employer->notify(new EmployerCreatedNotification($company));
//            $admin->notify(new CompanyCreatedNotification($company));
            if ($company) {
                $tableName = $this->model->getTable();
                $lastId = $this->model->latest()->first()->id;
                $filePath = 'uploads/' . $tableName;
                $fileData['company_logo'] = $this->customFileUpload($filePath);
                $this->updateFile($lastId, $fileData);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }

    public function update($id, $data)
    {
        $this->model->find($id)->update($data);
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

        $realPath = $post->company_logo;
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

    public function updateStatusupdateStatus($id, $data)
    {
        $this->model->find($id)->update($data);

    }
}
