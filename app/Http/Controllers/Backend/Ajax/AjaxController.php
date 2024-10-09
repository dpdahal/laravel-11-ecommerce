<?php

namespace App\Http\Controllers\Backend\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class AjaxController extends Controller
{

    public function loadNestedRelationship($category)
    {
        $category->load('children');
        if ($category->children) {
            foreach ($category->children as $child) {
                $this->loadNestedRelationship($child);
            }
        }
    }


    public function getAjaxCategory()
    {
        $categoryData = BlogCategory::where('parent_id', null)->orderBy('id', 'desc')->get();;
        $categoryData->each(function ($category) {
            $this->loadNestedRelationship($category);
        });
        return response()->json(['categoryData' => $categoryData]);
    }

    public function setAjaxCategory(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'parent_id' => 'nullable|integer',
            ]);
            $validatedData['slug'] = Str::slug($request->name);
            $validatedData['user_id'] = auth()->user()->id;
            $insertData = BlogCategory::create($validatedData);
            return response()->json(['categoryData' => $insertData], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422); // 422 is the status code for unprocessable entity (validation error)
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create category'], 500); // 500 is the status code for internal server error
        }
    }



    function ajaxFileManage(Request $request)
    {
        $tableName = $request->tableName;
        $id = $request->id;
        $type = $request->type;
        $columnName = $request->columnName ?? 'image';

        if ($type == 'get_file') {
            $findData = DB::table($tableName)->select($columnName)->where('id', $id)->first();
            if (!$findData->$columnName) {
                $findData->$columnName = url('icons/notfound.png');
            } else {
                $findData->$columnName = url($findData->$columnName);
            }
            return response()->json(['data' => $findData]);
        } else if ($type == 'delete_file') {
            $findData = DB::table($tableName)->select($columnName)->where('id', $id)->first();
            if ($findData->$columnName) {
                $this->deleteFile($findData->$columnName);
            }
            DB::table($tableName)->where('id', $id)->update([$columnName => ""]);
            return response()->json(['success' => 'File deleted successfully']);
        } else {
            $findData = DB::table($tableName)->select($columnName)->where('id', $id)->first();
            $uploadPath = 'uploads/' . $tableName;
            if ($findData->$columnName) {
                $this->deleteFile($findData->$columnName);
                $fileName = $this->customFileUpload($uploadPath, $request);
                DB::table($tableName)->where('id', $id)->update([$columnName => $fileName]);
                return response()->json(['success' => 'File uploaded successfully']);
            } else {
                $fileName = $this->customFileUpload($uploadPath, $request);
                DB::table($tableName)->where('id', $id)->update([$columnName => $fileName]);
                return response()->json(['success' => 'File uploaded successfully']);
            }
        }
    }


}
