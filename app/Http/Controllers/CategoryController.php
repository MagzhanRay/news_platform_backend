<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCategoryRequest;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

    public function getCategories()
    {
        $categories = $this->categoryService->getList();

        return response()->json([
           'status' => 'success',
           'message' => $categories
        ]);
    }

    public function createCategory(PostCategoryRequest $request)
    {
        $data = $request->validated();

        $category = $this->categoryService->create($data);

        if(false === $category){
            return response()->json([
                'status' => 'error',
                'message' => 'Категория не создался'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Категория создан'
        ]);
    }

    public function updateCategory(int $id, PostCategoryRequest $request)
    {
        $data = $request->validated();

        $category = $this->categoryService->update($id, $data);

        if(false === $category){
            return response()->json([
                'status' => 'error',
                'message' => 'Категория не обновился'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Категория обновился'
        ]);
    }

    public function deleteCategory(int $id)
    {
        $category = $this->categoryService->delete($id);

        if(false === $category){
            return response()->json([
                'status' => 'error',
                'message' => 'Категория не удалился'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Категория удалился'
        ]);
    }
}
