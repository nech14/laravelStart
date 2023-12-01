<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Coach;
use App\Models\Purchased_course;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.users', compact('users'));
    }

    public function show($id){
        $user = User::getName($id);
        $purchased_courses = Purchased_course::where('commentable_type', 'App\Models\User')
        ->where('commentable_id', $id)
        ->get();
        return view('users.user', compact('user', 'purchased_courses'));
    }

    public function edit($id){
        $user = User::getName($id);
        return view('users.edit', compact('user'));
    }

    public function update_user($id, Request $request){
        $user = User::getName($id);
        $request->validate([
            'name' => 'required|min:2',
            'lastname' => 'required',
            'age' => 'required|numeric|min:12|max:99',
            'city' => 'required',
            'email' => 'required|email'
        ], [
            'name.required' => 'Необходимо ввести имя!',
            'name.min' => 'В имени должно быть минимум :min символа.',
            'lastname.required' => 'Необходимо ввести фамилию!',
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
                'age' => $request->input('age'),
                'city' => $request->input('city'),
                'email' => $request->input('email'),
            ]);
        });

        return redirect('/users/'.$id);
    }

    public function delete($id){
        $user = User::find($id);
        $user->posts()->delete();
        $user->delete();
        return redirect('users');
    }

    public function create(){
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request){
        
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required',
            'patronymic' => 'required',
            'password' => 'required|min:2',
            'email' => 'required|email'
        ], [
            'first_name.required' => 'Необходимо ввести имя!',
            'first_name.min' => 'В имени должно быть минимум :min символа.',
            'last_name.required' => 'Необходимо ввести фамилию!',
            'password.required' => 'Необходимо ввести пароль!',
            'patronymic.required' => 'Необходимо ввести возраст!',
            'email.required' => 'Необходимо ввести email!',
            'email.email' => 'Это не похоже на email.'
        ]);

        $now = Carbon::now();

        $user = new User([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'patronymic' => $request->input('patronymic'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $user->save();        

        return redirect('users');
    }
}
