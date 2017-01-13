<?php

namespace App\Http\Controllers;

use Validator;
use App\Textproject;
use Illuminate\Http\Request;

class TextProjectController extends Controller
{
    protected $textproject = null;

    public function __construct(Textproject $textproject)
    {
        $this->textproject = $textproject;
    }

    public function createTextProject(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'languageto' => 'required',
            'languagefrom' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->first());
        }
        return $this->textproject->createTextProject($request);
    }
    public function getAllTextProject(){
        return $this->textproject->getAllTextProject();
    }
    public function getTextProjectById($id){

        $textproject = $this->textproject->getTextProjectById($id);
        if (!$textproject){
            return response()->json(['response' => 'Fail'], 400);
        }else return $textproject;

    }
    public function updateTextProject(Request $request, $id){

       /* $validator = Validator::make($request->all(),[
            'name' => 'required',
            'languageto' => 'required',
            'languagefrom' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->first());
        }*/

        return $this->textproject->updateTextProject($request, $id);
    }
    public function deleteTextProject($id){
        $texproject =  $this->textproject->deleteTextProject($id);

        if (!$texproject){
            return response()->json(['response' => 'Fail'], 400);
        }
            return response()->json(['response' => 'Successful'], 200);
    }
}
