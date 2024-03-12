<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 2)->latest('id')->paginate(8);
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        $similares = Post::where('categoria_id', $post->categoria_id)
            ->where('status', 2)
            ->where('id','!=',$post->id)
            ->latest('id')
            ->take(4)
            ->get();
        return view('posts.show', compact('post', 'similares'));
    }
    public function categoria(Categoria $categoria){
        $posts=Post::where('categoria_id',$categoria->id)
            ->where('status', 2)
            ->latest('id')
            ->paginate(6);
        return view('posts.categoria', compact('posts','categoria'));
    }
    public function tag(Tag $tag){
        return $tag;
    }
}
