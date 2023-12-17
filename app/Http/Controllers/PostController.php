<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{   
    public function create($id){
        return view('layouts/posts/post_reg', compact('id'));
    }
    

    public function store(Request $request){
        
        $request->validate([
            'user_id' => 'required|numeric',
            'publiched_at' => 'required',
            'name' => 'required|min:2',
            'text' => 'required|min:10'
        ], [
            'user_id.required' => 'Необходимо ввести user_id!',
            'user_id.numeric' => 'user_id должен быть числом!',
            'publiched_at.required' => 'Нобходимо ввести дату публикации!',
            'name.required' => 'Необходимо ввести название публикации!',
            'name.min' => 'В названии должно быть минимум :min символа.',
            'text.requred' => 'Необходимо ввсети содержание публикации!',
            'text.min' => 'Содержание публикации должено состоять минимум из :min символов.'
        ]);

        $now = Carbon::now();

        $post = new Post([
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'publiched_at' => $request->input('publiched_at'),
            'text' => $request->input('text'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        $post->save();        

        return view('layouts/index', ['result' => 'Публикация добавлена!']);
    }

    public function index(){
        $posts = Post::all();

        return view('/layouts/posts/posts', compact('posts'));
    }

    public function get_post_by_id(Request $request){
        $request->id;
        return redirect()->route('post.id', ['id' => $request->input('post_id')]);
    }

    public function get_post($id){
        $post = Post::withUser($id);

        if (blank($post)){
            $result = "Поста с id = $id нет";
            
            return view('/layouts/result',['result' => $result]);
        }        

        $json = (json_encode($post, JSON_PRETTY_PRINT));

        return view('/layouts/posts/post',['json' => $json]);
    }

    public function edit($id){
        $post = Post::query()->find($id);
        
        return view('/layouts/posts/post_edit', ['post' => $post]);
    }

    public function update($id, Request $request){
        $post = Post::query()->find($id);

        $request->validate([
            'publiched_at' => 'required',
            'name' => 'required|min:2',
            'text' => 'required|min:10'
        ], [
            'publiched_at.required' => 'Нобходимо ввести дату публикации!',
            'name.required' => 'Необходимо ввести название публикации!',
            'name.min' => 'В названии должно быть минимум :min символа.',
            'text.requred' => 'Необходимо ввсети содержание публикации!',
            'text.min' => 'Содержание публикации должено состоять минимум из :min символов.'
        ]);


        DB::transaction(function () use ($post, $request) {
            $post->update([
                'publiched_at' => $request->input('publiched_at'),
                'name' => $request->input('name'),
                'text' => $request->input('text')
            ]);
        });

        return view('layouts/index', ['result' => 'Пост обновлён!']);
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index');
    }

    public function json_id($id){
        $post = Post::query()->find($id);
        
        if (empty($post)){
            return ["data" => -1];
        }

        return new PostResource($post);
    }

    public function jsons(){
        $posts = Post::all();
        
        if (empty($posts)){
            return ["data" => -1];
        }

        return PostResource::collection($posts);
    }

    public function get_json(Request $request){        
        $request->id;
        return redirect()->route('post.json.id', ['id' => $request->input('id')]);
    }

}
