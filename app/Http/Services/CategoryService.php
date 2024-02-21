<?php

namespace App\Http\Services;

use App\Models\CategoryModel;

class CategoryService
{
    public function create(array $data)
    {
        return CategoryModel::create($data);
    }

    public function getList()
    {
        return CategoryModel::all();
    }

    public function update(int $id, array $data)
    {
        $category = CategoryModel::find($id);
        $category->name = $data['name'];
        return $category->save();
    }

    public function delete(int $id)
    {
        $category = CategoryModel::findOrFail($id);

        return $category->delete();
    }

}
