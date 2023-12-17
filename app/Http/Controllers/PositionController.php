<?php

namespace App\Http\Controllers;

use App\Http\Resources\Position\PositionResource;
use App\Models\Position;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    public function create($id){
        return view('layouts/positions/position_reg', compact('id'));
    }
    
    
    public function store(Request $request){
        
        $request->validate([
            'user_id' => 'required|numeric',
            'working_position' => 'required|min:2',
            'city' => 'required|min:2',
            'organization' => 'required|min:2'
        ], [
            'user_id.required' => 'Необходимо ввести user_id!',
            'user_id.numeric' => 'user_id должен быть числом!',
            'working_position.required' => 'Нобходимо ввести должность работника!',
            'working_position.min' => 'В названии должности должно быть минимум :min символа.',
            'city.required' => 'Необходимо ввести название города работнкиа!',
            'city.min' => 'В названии города должно быть минимум :min символа.',
            'organization.requred' => 'Необходимо ввсети название организации работника!',
            'organization.min' => 'Название организации работника должена состоять минимум из :min символов.'
        ]);

        $now = Carbon::now();

        $position = new Position([
            'user_id' => $request->input('user_id'),
            'working_position' => $request->input('working_position'),
            'city' => $request->input('city'),
            'organization' => $request->input('organization'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        $position->save();        

        return view('layouts/index', ['result' => 'Должность к работнику добавлена!']);
    }


    public function index(){
        $positions = Position::all();

        return view('/layouts/positions/positions', compact('positions'));
    }


    public function get_position($id){
        $position = Position::withUser($id);

        if (blank($position)){
            $position = "Пользователь с id = $id не работник";
            
            return view('/layouts/result',['result' => $position]);
        }

        $json = (json_encode($position, JSON_PRETTY_PRINT));

        //return view('/layouts/users/users', ['users' => $user]);
        return view('/layouts/positions/position',['json' => $json]);
    }


    public function get_position_by_id(Request $request){
        $request->user_id;
        return redirect()->route('position.id', ['id' => $request->input('user_id')]);
    }


    public function edit($id){
        $position = Position::where('user_id', $id)->get()->first();
        
        return view('/layouts/positions/position_edit', ['position' => $position]);
    }

    public function update($id, Request $request){
        $position = Position::where('user_id', $id)->first();

        $request->validate([
            'working_position' => 'required|min:2',
            'city' => 'required|min:2',
            'organization' => 'required|min:2',
            'name' => 'required|min:2',
            'lastname' => 'required|min:2',
            'password' => 'required|min:8',
            'age' => 'required|numeric|min:16|max:150',
            'email' => 'required|email'
        ], [
            'working_position.required' => 'Нобходимо ввести должность работника!',
            'working_position.min' => 'В названии должности должно быть минимум :min символа.',
            'city.required' => 'Необходимо ввести название города работнкиа!',
            'city.min' => 'В названии города должно быть минимум :min символа.',
            'organization.requred' => 'Необходимо ввсети название организации работника!',
            'organization.min' => 'Название организации работника должена состоять минимум из :min символов.',
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


        DB::transaction(function () use ($position, $request) {
            Position::where('user_id', $position->user_id)
                ->update([
                    'working_position' => $request->input('working_position'),
                    'city' => $request->input('city'),
                    'organization' => $request->input('organization')
                ]);
        });
        

        $user = User::where('id', $position->user_id)->first();
        DB::transaction(function () use ($user, $request) {
            $user->update([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'password' => $request->input('password'),
                'age' => $request->input('age'),
                'email' => $request->input('email'),
            ]);
        });


        return view('layouts/index', ['result' => 'Работник обновлён!']);
    }

    public function delete($id){
        Position::where('user_id', $id)->delete();
        return redirect()->route('position.index');
    }
    
    public function json_id($id){
        $position = Position::where('user_id', $id)->get()->first();
        
        if (empty($position)){
            return ["data" => -1];
        }

        return new PositionResource($position);
    }

    public function jsons(){
        $positions = Position::all();
        
        if (empty($positions)){
            return ["data" => -1];
        }

        return PositionResource::collection($positions);
    }

    public function get_json(Request $request){        
        $request->id;
        return redirect()->route('position.json.id', ['id' => $request->input('id')]);
    }
}
