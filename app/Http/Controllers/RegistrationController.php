<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
        $existingData = json_decode(file_get_contents('form-data.json'), true);

        if (!$existingData) {
            $existingData = [];
        }

        $table = '<table>';
        $table .= '<tr>
                        <th>Номер записи</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Дата</th>
                        <th>Время</th>
                    </tr>';

        foreach ($existingData as $record) {
            $table .= '<tr>';
            $table .= '<td>' . $record['record_number'] . '</td>';
            $table .= '<td>' . $record['name'] . '</td>';
            $table .= '<td>' . $record['email'] . '</td>';
            $table .= '<td>' . $record['phone'] . '</td>';
            $table .= '<td>' . $record['date'] . '</td>';
            $table .= '<td>' . $record['time'] . '</td>';
            $table .= '</tr>';
        }

        $table .= '</table>';

        return view('layouts/records', ['table' => $table]);
    }

    public function create(){
        return view('layouts/registrationForm');
    }


    public function store(Request $request){
        $formData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ];

        $existingData = json_decode(file_get_contents('form-data.json'), true);

        if (!$existingData) {
            $existingData = [];
        }

        $recordNumber = count($existingData);

        $newRecord = [
            'record_number' => $recordNumber,
        ];

        $newRecord = array_merge($newRecord, $formData);

        $existingData[] = $newRecord;

        $jsonData = json_encode($existingData);

        file_put_contents('form-data.json', $jsonData);

        return view('layouts/index', ['result' => 'Вы успешно записались!']);
    }

    public function show($record){
        return "Страница просмотра записи №{$record}";
    }

    public function edit($record){
        return "Изменение записа №{$record}";
    }

    public function delete($record){
        return "удалить запись №{$record}";
    }
}
