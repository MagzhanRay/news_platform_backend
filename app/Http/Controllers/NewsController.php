<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostNewsRequest;
use App\Http\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    private NewsService $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function createNews(PostNewsRequest $request)
    {
        $data = $request->validated();

        $news = $this->newsService->create($data);

        if(false === $news){
            return response()->json([
                'status' => 'error',
                'message' => 'Новость не создался'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Новость создан'
        ]);
    }

    public function getNews()
    {
        $news = $this->newsService->getList();

        return response()->json([
            'status' => 'success',
            'message' => $news
        ]);
    }

    public function getNewsById(int $id)
    {
        $news = $this->newsService->getById($id);

        return response()->json([
            'status' => 'success',
            'message' => $news
        ]);
    }

    public function updateNews(int $id, PostNewsRequest $request)
    {
        $data = $request->validated();

        $category = $this->newsService->update($id, $data);

        if(false === $category){
            return response()->json([
                'status' => 'error',
                'message' => 'Новость не обновился'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Новость обновился'
        ]);
    }

    public function deleteNews(int $id)
    {
        $category = $this->newsService->delete($id);

        if(false === $category){
            return response()->json([
                'status' => 'error',
                'message' => 'Новость не удалился'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Новость удалился'
        ]);
    }
}
