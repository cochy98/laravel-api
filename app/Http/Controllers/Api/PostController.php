<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Richiedo tutti i post, con relative categorie connesse a essi, paginati 6 per volta
        $posts = Post::orderBy('id', 'DESC')->with('categories')->paginate(6);
        return response()->json(
            [
                'results' => $posts,
            ]
        );
    }
}
