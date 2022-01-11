<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondController extends Controller
{
    public function createProduct(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $brand = $request->input('brand');
       if(!$name||!$description||!$price||!$brand)
       {
           return response()->json(['message'=>'Invalid payed , all fields are required.','data'=>null],400);
       }
       $filePath = 'C:\xampp\htdocs\products_list.json';
       $fileContent = file_get_contents($filePath);
       $jsonContent = json_decode($fileContent,true);
       $payload = [
           'name'=>$name,
           'description'=>$description,
           'price'=>$price,
           'brand'=>$brand,
       ];
       if(!$jsonContent || !is_array($jsonContent))
       {
           $content = [
               $payload
           ];
           file_put_contents($filePath,json_encode($content));
       }
       else {
           $jsonContent[]= $payload;
           file_put_contents($filePath,json_encode($content));
       }
       return response()->json(['message'=>'Product has been addad successfully','data'=>$payload]);
    }
    public function DeleteProductById($prudectId)
    {

    }
    public function ListAllProduct()
    {

    }
    
}
