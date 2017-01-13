<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Textproject extends Model
{
    public $timestamps = false;

    public function createTextProject(Request $request){
        $textproject = new Textproject();

        $textproject->name = $request->name;
        $textproject->languageto = $request->languageto;
        $textproject->languagefrom = $request->languagefrom;

        $textproject->save();

        return json_encode($textproject);

    }
    public function getAllTextProject(){
        return json_encode(Textproject::all());
    }
    public function getTextProjectById($id){
        $textproject = Textproject::find($id);

        if (is_null($textproject)){
            return false;
        }
        return json_encode($textproject);

    }
    public function updateTextProject(Request $request, $id){
        $textproject = Textproject::find($id);

        if($request->name) {$textproject->name = $request->name;}
        if($request->languageto) {$textproject->languageto = $request->languageto;}
        if($request->languagefrom) {$textproject->languagefrom = $request->languagefrom;}

        $textproject->save();

        return json_encode($textproject);

    }
    public function deleteTextProject($id){
        $textproject = Textproject::find($id);
        if (is_null($textproject)){
            return false;
        }

        return $textproject->delete();


    }
}
