<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        // $this->authorize('admin');

        return view(
            'posts.index',
            [
                'posts' => Post::latest()->filter(
                    request(['search','category','author'])
                    // include withQueryString() to fix pagination when paginating posts from a single category. If not included when clicking next page on a pagination from a single category it will default to homepage pagination and not paginate the page where youre currently at.
                )->paginate(6)->withQueryString()
            ]
        );
    }

    public function show(Post $post)
    {
        return view(
            'posts.show',
            [
                'post'=> $post
                ]
        );
    }
}
