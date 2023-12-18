<?php

namespace App\Http\Controllers;

use App\Http\Resources\Comment\CommentResource;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function create($id, $idc){
        return view('layouts/comments/comment_reg', compact('id', 'idc'));
    }

    public function store($idc, Request $request){
        
        $request->validate([
            'user_id' => 'required|numeric',
            'commentable_id' => 'required|numeric',
            'rating' => 'required|numeric',
            'comment' => 'required|min:4'
        ], [
            'user_id.required' => 'Необходимо ввести user_id!',
            'user_id.numeric' => 'user_id должен быть числом!',
            'commentable_id.required' => 'Нeобходимо ввести id оцениваемого!',
            'commentable_id.numeric' => 'Оцениваемого id должен быть числом!',
            'rating.required' => 'Необходимо ввести оценку!',
            'rating.numeric' => 'Рейтинг должен быть числом.',
            'comment.requred' => 'Необходимо ввсети комментарий!',
            'comment.min' => 'Содержание комментария должно состоять минимум из :min символов.'
        ]);

        $now = Carbon::now();
        
        if ($request->input('commentable_type') == 'user'){
            $comment = new Comment([
                'user_id' => $request->input('user_id'),
                'commentable_type' => get_class(new User),
                'commentable_id' => $request->input('commentable_id'),
                'rating' => $request->input('rating'),
                'comment' => $request->input('comment'),
                'create_at' => $now,
                'update_at' => $now
            ]);
        } else if($request->input('commentable_type') == 'post'){
            $comment = new Comment([
                'user_id' => $request->input('user_id'),
                'commentable_type' => get_class(new Post),
                'commentable_id' => $request->input('commentable_id'),
                'rating' => $request->input('rating'),
                'comment' => $request->input('comment'),
                'create_at' => $now,
                'update_at' => $now
            ]);
        }

        $comment->save();        

        return view('layouts/index', ['result' => 'Публикация добавлена!']);
    }

    public function index(){
        $comments = Comment::all();
        
        return view('/layouts/comments/comments', compact('comments'));
    }

    public function get_comment_by_id(Request $request){
        $request->id;
        return redirect()->route('comment.id', ['id' => $request->input('id')]);
    }

    public function get_comment($id){
        $comment = Comment::withUserPost($id);

        if (blank($comment)){
            $comment = "Комментария с id = $id нет";
            
            return view('/layouts/result',['result' => $comment]);
        }


        //$table =  $this->get_table([$comment]);
        $json = (json_encode($comment, JSON_PRETTY_PRINT));

        //return view('/layouts/comments/comments', ['comments' => $comment]);
        return view('/layouts/comments/comment',['json' => $json]);
    }


    public function edit($id){
        $comment = Comment::query()->find($id);
        
        return view('/layouts/comments/comment_edit', ['comment' => $comment]);
    }

    public function update($id, Request $request){
        $comment = Comment::query()->find($id);

        $request->validate([
            'user_id' => 'required|numeric',
            'commentable_id' => 'required|numeric',
            'rating' => 'required|numeric',
            'comment' => 'required|min:4'
        ], [
            'user_id.required' => 'Необходимо ввести user_id!',
            'user_id.numeric' => 'user_id должен быть числом!',
            'commentable_id.required' => 'Нeобходимо ввести id оцениваемого!',
            'commentable_id.numeric' => 'Оцениваемого id должен быть числом!',
            'rating.required' => 'Необходимо ввести оценку!',
            'rating.numeric' => 'Рейтинг должен быть числом.',
            'comment.requred' => 'Необходимо ввсети комментарий!',
            'comment.min' => 'Содержание комментария должно состоять минимум из :min символов.'
        ]);


        DB::transaction(function () use ($comment, $request) {
            $comment->update([
                'rating' => $request->input('rating'),
                'comment' => $request->input('comment')
            ]);
        });

        return view('layouts/index', ['result' => 'Комментарий обновлён!']);
    }

    public function approve($id){
        $comment = Comment::find($id);
        $result = 'Комментарий одобрен!';
        if ($comment->approved){
            $result = 'Одобрение снято с комментария!';
        }
        $comment->update([
            'approved' => !$comment->approved
        ]);

        return view('layouts/result', ['result' => $result]);
    }

    public function delete($id){        
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('comment.index');
    }

    public function json_id($id){
        $comment = Comment::query()->find($id);
        
        if (empty($comment)){
            return ["data" => -1];
        }

        return new CommentResource($comment);
    }

    public function jsons(){
        $comments = Comment::all();
        
        if (empty($comments)){
            return ["data" => -1];
        }

        return CommentResource::collection($comments);
    }

    public function get_json(Request $request){        
        $request->id;
        return redirect()->route('comment.json.id', ['id' => $request->input('id')]);
    }
}
