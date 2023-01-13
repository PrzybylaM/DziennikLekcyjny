<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserForm extends Controller
{
    public function addStudent(Request $req){
        $req->validate([
            'name' => 'required | min:3 | max:10',
            'email' => 'required | email'
        ],
            [
                'name.required' => 'Wypełnij pole imię',
                'name.min' => 'Pole :attribute  musi mieć minimalnie :min znaki',
            ]);
        return $req->input();
    }
}
