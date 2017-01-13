<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Textpart extends Model
{

    public $timestamps = false;

    public function createTextPart(Request $request){
        $textPart = new Textpart();

        $textPart->name = $request->name;
        $textPart->body = $request->body;
        $textPart->userid = $request->userid;
        $textPart->projectid = $request->projectid;

        $textPart->save();

        return json_encode($textPart);
    }
    public function getAllNamesOfTextPart(){

        $textpart = DB::table('textparts')->select('id', 'name')->get();
        return json_encode($textpart);

    }
    public function getTextPartById($id){
        $textPart = Textpart::find($id);
        if (is_null($textPart)){
            return false;
        }

        return json_encode($textPart);
//        return $textPart->body;
    }
    public function updateTextPart(Request $request, $id){
        $textPart = Textpart::find($id);

        if ($request->name) {$textPart->name = $request->name;}
        if ($request->body) {$textPart->body = $request->body;}
        if ($request->user_id) {$textPart->user_id = $request->user_id;}
        if ($request->textproject_id) {$textPart->textproject_id = $request->textproject_id;}

        $textPart->save();

        return json_encode($textPart);

    }
    public function deleteTextPart($id){
        $textPart = Textpart::find($id);
        if (is_null($textPart)){
            return false;
        }

        return $textPart->delete();
    }

    public function getListOfNamesOFTextPartsOfUserById($id){

        /*$textpart = DB::table('textparts')->select('id', 'name', 'body')
            ->where('userid', $id)
            ->get();*/


//        return json_encode($textpart);
//        return $textpart;
    }

    public function getText($id){
        $textpart = DB::table('textparts')->select('body')
            ->where('projectid', $id)
            ->get();

        return json_encode($textpart);
    }
}
