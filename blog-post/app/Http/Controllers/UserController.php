<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // GET-ERI
    public function returnAllUsers()
    {
        $users = User::all();
        return $users;
    }

    public function returnSpecificUser($user_id)
    {
        $user = User::find($user_id);

        if(is_null($user))
        {
            return response()->json('A user with the provided ID does not exist in the database', 404);
        }

        return response()->json($user);
    }

    //SET-ERI
    public function createUser()
    {
        
    }

}
