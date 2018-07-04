<?php

namespace App\Services;

use App\Models\User;

class UserService {
    
    public function __construct(){

    }

    public function getAllUsers(){
        $allUsers = User::all()->toArray();
        return $allUsers;
    }

    public function createUser($body){
        try{
            $name = $body['name'];
            $surname = $body['surname'];
            $age = (int) $body['age'];
            $user = new User;
            $user->name = $name;
            $user->surname = $surname;
            $user->age = $age;
            $user->save();

        } catch(Exeption $e) {
            return false;
        }
        return true;
        // var_dump($user);die();
    }

    public function getUserById($id){
        $user = User::find($id);
        return $user->toArray();
    }
    public function editUserById($id, $body){
        $user = User::find($id)->first();
        try{
            $user->name = $body['name'];
            $user->surname = $body['surname'];
            $user->age = $body['age'];
            $user->save();
        }catch(Exception $e){
            return false;
        }

        return true;
    }
    public function deleteUser($id){
        try{
            User::destroy($id);
        }catch(Exception $e){
            return false;
        }
        return true;
    }
}
