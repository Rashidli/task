<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Post;
use App\Models\PostTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class PostController extends Controller
{

    public function lang($lang)
    {

        Session::put('language', $lang);
        return redirect()->back();

    }

    public function post_data(Request $request)
    {

        Post::create([
            'author' => 'Seymur',
            'az'=>[
                'title'=>$request->az_title,
                'content'=>$request->az_content
            ],
            'en'=>[
                'title'=>$request->en_title,
                'content'=>$request->en_content
            ]
        ]);

        return redirect()->route('post_list');

    }

    public function edit_data($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit_post', compact('post'));
    }

    public function update_data($id, Request $request)
    {
        $data = [
            'author' => 'Seymur',
            'az'=>[
                'title'=>$request->az_title,
                'content'=>$request->az_content
            ],
            'en'=>[
                'title'=>$request->en_title,
                'content'=>$request->en_content
            ]
        ];
        $post = Post::findOrFail($id);

        $post->update($data);
        return redirect()->back();
    }
    public function index()
    {
        $languages = Language::all();
        return view('post.index', compact('languages'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->save();

        $post_translate = new PostTranslation();


        $languages = Language::all();

        foreach ($request->title as $title){
            $post_translate->title = $post->title;
            $post_translate->language = $post->title;
            $post_translate->post_id = $post->id;
        }

        foreach ($languages as $lang){
            $post_translate->title = $post->title;
        }




    }
}
