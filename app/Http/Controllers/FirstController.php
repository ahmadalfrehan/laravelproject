<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{   
    public function checkUserName(){
        $age=false;
        $name = request()->query('name');
        $email = request()->query('email');
        $num = request()->query('age');
        if(!isset($name)){
        return response()->json([
            'message'=>'you have to fill name parameter',
        ]);
    }
    if(!isset($email)){
        return response()->json([
            'message'=>'you have to fill email parameter',
        ]);
    }
    if(!isset($num)){
        return response()->json([
            'message'=>'you have to fill age parameter',
        ]);
    }
    $fileContent = file_get_contents('http://localhost:80/jsonfileexrcis.json');
    $jsonContent = json_decode($fileContent,true);
    /*if(!in_array($name,$jsonContent)){
        return response()->json([
            'message' => sprintf('%s is invalid supplied name',$name)
        ]);
    }
    return response()->json([
        'message' => 'welcome!'
    ]);*/
    for($i=0;$i<Count($jsonContent["employees"]);$i+=1)
    {
        if($jsonContent["employees"][$i]["name"]==$name)
        {
            if($jsonContent["employees"][$i]["email"]==$email)
            {
                if($jsonContent["employees"][$i]["age"]==$num){
                  $age=true;
                }
                if($age==false){
                    return response()->json([
                        'message'=>'your age is not found',
                    ]);
                }
                return response()->json([
                    'message'=>'found',
                ]);
            }
            if($jsonContent["employees"][$i]["age"]==$num){
                return response()->json([
                    'message'=>'check your email!',
                ]);
            }
        }
    }
}
}