<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Language extends Model
{
    public $timestamps = false;

    public function getListOfLanguage(){
        return Language::all();
    }

    public function createLanguage(Request $request){
        $language = new Language();
        $language->language = $request->language;
        $language->save();

        return json_encode($language);

    }

    public function deleteLanguage($id){
        $language = Language::find($id);
        if (is_null($language)){
            return false;
        }

        return $language->delete();
    }
}
