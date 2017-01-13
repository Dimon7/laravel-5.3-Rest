<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Language;



class LanguageController extends Controller
{
    protected $language = null;


    public function __construct(Language $language)
    {
        $this->language=$language;
    }

    public function getListOfLanguage(){
        return $this->language->getListOfLanguage();
    }

    public function createLanguage(Request $request){

        $validator = Validator::make($request->all(),[
            'language' => 'required|unique:languages,language'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->first());
        }
        return $this->language->createLanguage($request);

    }

    public function deleteLanguage($id){
        $language = $this->language->deleteLanguage($id);

        if (!$language){
            return response()->json(['response' => 'Fail'], 400);
        }
        return response()->json(['response' => 'Successful'], 200);
    }




}
