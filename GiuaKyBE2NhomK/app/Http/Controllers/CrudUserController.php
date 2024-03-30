<?php

namespace App\Http\Controllers;
class CrudUserController extends Controller
{
    public function createUser()
    {
        return view('crud_user.create');
    }
}
