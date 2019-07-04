<?php

namespace App\Http\Controllers;

use App\Post;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Без сортировки
//        $posts = Post::with('comments')
//            ->limit(10)
//            ->get();

        // Сортировка по полю published_at
        $posts = Post::join('comments', 'comments.post_id', '=', 'posts.id')
            ->orderBy('comments.published_at', 'desc')
            ->with('comments')
            ->select('posts.*')
            ->limit(10)
            ->get();

        return view('welcome', compact('posts'));
    }
}