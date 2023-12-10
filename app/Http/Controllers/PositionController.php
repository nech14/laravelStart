<?php

namespace App\Http\Controllers;

use App\Http\Resources\Position\PositionResource;
use App\Models\Position;

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

    
    public function get_table($positions){
        $table = '<table>';
        $table .= '<tr>
                        <th>user_id</th>
                        <th>Должность</th>
                        <th>Город</th>
                        <th>Название организации</th>
                    </tr>';

        foreach ($positions as $position) {
            $table .= '<tr>';
            $table .= '<td>' . '<a class="item_a" href="position/'. $position->user_id .'">' . $position->user_id . '</a>' . '</td>';
            $table .= '<td>' . $position->working_position . '</td>';
            $table .= '<td>' . $position->city . '</td>';
            $table .= '<td>' . $position->organization . '</td>';
            $table .= '</tr>';
        }

        $table .= '</table>';
        return $table;
    }


    public function index(){
        $positions = Position::all();

        $table =  $this->get_table($positions);

        return view('/layouts/positions/positions', ['table' => $table]);
    }


    public function get_position($id){
        $position = Position::where('user_id', $id)->get();

        if (empty($position)){
            $position = "Пользователь с id = $id не работник";
            
            return view('/layouts/positions/positions',['table' => $position]);
        }

        //$table =  $this->get_table([$position]);

        
        $position = Position::withUser($id);

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


        DB::transaction(function () use ($position, $request) {
            Position::where('user_id', $position->user_id)
                ->update([
                    'working_position' => $request->input('working_position'),
                    'city' => $request->input('city'),
                    'organization' => $request->input('organization')
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
