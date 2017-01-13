<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TextPart;

class TextPartController extends Controller
{

    protected $textpart = null;

    public function __construct(Textpart $textpart)
    {
        $this->textpart= $textpart;
    }

    public function createTextPart(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:textparts,name',
            'body' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->first());
        }
        return $this->textpart->createTextPart($request);
    }
    public function getAllNamesOfTextPart(){
        return $this->textpart->getAllNamesOfTextPart();
    }
    public function getTextPartById($id){
        $textpart =  $this->textpart->getTextPartById($id);

        if (!$textpart){
            return response()->json(['response' => 'Fail'], 400);
        }
        else return $textpart;

    }
    public function updateTextPart(Request $request, $id){
        return $this->textpart->updateTextPart($request, $id);
    }
    public function deleteTextPart($id){
        $textpart = $this->textpart->deleteTextPart($id);

        if (!$textpart){
            return response()->json(['response' => 'Fail'], 400);
        }
        return response()->json(['response' => 'Successful'], 200);
    }

    public function getListOfNamesOFTextPartsOfUserById($id){
        $textpart = DB::table('textparts')->select('id', 'name', 'body')
            ->where('userid', $id)
            ->get();
        return json_encode($textpart);
    }

    public function getText($id){
        return $this->textpart->getText($id);
    }
}
