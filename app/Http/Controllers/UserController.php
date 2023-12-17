<?php

namespace App\Http\Controllers;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Models\Position;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

class UserController extends Controller
{


    public function index(){
        $users = User::all();

        return view('/layouts/users/users', compact('users'));
    }


    public function get_user_by_id(Request $request){
        $request->id;
        return redirect()->route('user.id', ['id' => $request->input('user_id')]);
    }

    public function get_user($id){
        $user = User::query()->find($id);
        
        if (empty($user)){
            $user = "Пользователя с id = $id нет";
            
            return view('/layouts/result',['result' => $user]);
        }

        //$table =  $this->get_table([$user]);
        $json = (json_encode($user, JSON_PRETTY_PRINT));

        //return view('/layouts/users/users', ['users' => $user]);
        return view('/layouts/users/user',['json' => $json]);
    }

    public function edit($id){
        $user = User::query()->find($id);
        
        return view('/layouts/users/user_edit', ['user' => $user]);
    }

    public function update($id, Request $request){
        $user = User::query()->find($id);
        $request->validate([
            'name' => 'required|min:2',
            'lastname' => 'required|min:2',
            'password' => 'required|min:8',
            'age' => 'required|numeric|min:16|max:150',
            'email' => 'required|email'
        ], [
            'name.required' => 'Необходимо ввести имя!',
            'name.min' => 'В имени должно быть минимум :min символа.',
            'lastname.required' => 'Необходимо ввести фамилию!',
            'lastname.min' => 'В фамилии должно быть минимум :min символа.',
            'password.requred' => 'Необходимо ввсети пароль!',
            'password.min' => 'Пароль должен состоять минимум из :min символов.',
            'age.required' => 'Необходимо ввести возраст!',
            'age.min' => 'Не обслуживаем клиентов младше :min лет.',
            'age.max' => 'Не обслуживаем клиентов старше :max лет.',
            'age.numeric' => 'Возраст должен быть числом!', 
            'email.required' => 'Необходимо ввести email!',
            'email.email' => 'Это не похоже на email.'
        ]);
        
        DB::transaction(function () use ($user, $request) {
            $user->update([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'password' => $request->input('password'),
                'age' => $request->input('age'),
                'email' => $request->input('email'),
            ]);
        });

        return view('layouts/index', ['result' => 'Пользователь обновлён!']);
    }

    public function delete($id){
        $user = User::find($id);
        //$user->posts()->delete();
        $user->delete();
        return redirect()->route('users.index');
    }

    public function create(){
        return view('layouts/users/user_reg');
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|min:2',
            'lastname' => 'required|min:2',
            'password' => 'required|min:8',
            'age' => 'required|numeric|min:16|max:150',
            'email' => 'required|email'
        ], [
            'name.required' => 'Необходимо ввести имя!',
            'name.min' => 'В имени должно быть минимум :min символа.',
            'lastname.required' => 'Необходимо ввести фамилию!',
            'lastname.min' => 'В фамилии должно быть минимум :min символа.',
            'password.requred' => 'Необходимо ввсети пароль!',
            'password.min' => 'Пароль должен состоять минимум из :min символов.',
            'age.required' => 'Необходимо ввести возраст!',
            'age.min' => 'Не обслуживаем клиентов младше :min лет.',
            'age.max' => 'Не обслуживаем клиентов старше :max лет.',
            'age.numeric' => 'Возраст должен быть числом!', 
            'email.required' => 'Необходимо ввести email!',
            'email.email' => 'Это не похоже на email.'
        ]);

        $now = Carbon::now();

        $user = new User([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'password' => $request->input('password'),
            'age' => $request->input('age'),
            'email' => $request->input('email'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $user->save();        

        return view('layouts/index', ['result' => 'Пользователь добавлен!']);
    }


    public function json_id($id){
        $user = User::query()->find($id);
        
        if (empty($user)){
            return ["data" => -1];
        }

        return new UserResource($user);
    }

    public function jsons(){
        $users = User::all();
        
        if (empty($users)){
            return ["data" => -1];
        }

        return UserResource::collection($users);
    }

    public function get_json(Request $request){        
        $request->id;
        return redirect()->route('user.json.id', ['id' => $request->input('id')]);
    }
}
