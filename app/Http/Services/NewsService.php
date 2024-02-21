<?php

namespace App\Http\Services;



use App\Models\NewsModel;

class NewsService
{
    public function create(array $data)
    {
        return NewsModel::create($data);
    }

    public function getList()
    {
        return NewsModel::all();
    }

    public function getById(int $id)
    {
        return NewsModel::find($id);
    }

    public function update(int $id, array $data)
    {
        $category = NewsModel::find($id);
        $category->title = $data['title'];
        $category->description = $data['description'];
        $category->category_id = $data['category_id'];
        return $category->save();
    }

    public function delete(int $id)
    {
        $category = NewsModel::findOrFail($id);

        return $category->delete();
    }

}
