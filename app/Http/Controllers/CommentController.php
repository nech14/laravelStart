<?php

namespace App\Http\Controllers;

use App\Http\Resources\Comment\CommentResource;
use App\Models\Post;
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
                'commentable_type' => 'App\Models\User',
                'commentable_id' => $request->input('commentable_id'),
                'rating' => $request->input('rating'),
                'comment' => $request->input('comment'),
                'create_at' => $now,
                'update_at' => $now
            ]);
        } else if($request->input('commentable_type') == 'post'){
            $comment = new Comment([
                'user_id' => $request->input('user_id'),
                'commentable_type' => 'App\Models\Post',
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
    

    public function get_table($comments){
        $table = '<table>';
        $table .= '<tr>
                        <th>id</th>
                        <th>user_id</th>
                        <th>Одобрен</th>
                        <th>Commentable_type</th>
                        <th>Commentable_id</th>
                        <th>Оценкаг</th>
                        <th>Комментарий</th>
                    </tr>';

        foreach ($comments as $comment) {
            $table .= '<tr>';
            $table .= '<td>' . $comment->id .'</td>';
            $table .= '<td>' . '<a class="item_a" href="user/'. $comment->user_id .'">' . $comment->user_id . '</a>' . '</td>';
            $b = $comment->approved == 0 ? "false" : "true";
            $table .= '<td>' . $b . '</td>';
            $table .= '<td>' . $comment->commentable_type . '</td>';
            $table .= '<td>' . $comment->commentable_id . '</td>';
            $table .= '<td>' . $comment->rating . '</td>';
            $table .= '<td>' . $comment->comment . '</td>';
            $table .= '</tr>';
        }

        $table .= '</table>';
        return $table;
    }

    public function index(){
        $comments = Comment::all();

        $table =  $this->get_table($comments);

        return view('/layouts/comments/comments', ['table' => $table]); //compact('comments')
    }

    public function get_comment_by_id(Request $request){
        $request->id;
        return redirect()->route('comment.id', ['id' => $request->input('id')]);
    }

    public function get_comment($id){
        $comment = Comment::query()->find($id);

        if (empty($comment)){
            $comment = "Комментария с id = $id нет";
            
            return view('/layouts/comments/comments',['table' => $comment]);
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
}