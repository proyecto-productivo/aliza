<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeDoc;
use App\State;
use App\City;
use App\TypePet;
use App\SubTypePet;
use Storage;
use App\ProcessType;
use Auth;

class MainController extends Controller
{
    public function missed(){
        return view ('go_missed');
    }

    public function found(){
        return view ('go_found');
    }

    public function search_document(){
        $typeDocs       = TypeDoc::orderBy('description', 'asc')->pluck('description', 'id');
        $states         = State::orderBy('name', 'asc')->pluck('name', 'code');
        $cities         = City::orderBy('name', 'asc')->pluck('name', 'code');
        $process_id = 1;
        return view ('document.search-document', compact('process_id', 'typeDocs', 'states', 'cities'));
    }

    public function found_document(){
        $typeDocs       = TypeDoc::orderBy('description', 'asc')->pluck('description', 'id');
        $states         = State::orderBy('name', 'asc')->pluck('name', 'code');
        $cities         = City::orderBy('name', 'asc')->pluck('name', 'code');
        $process_id = 2;
        return view ('document.found-document', compact('process_id', 'typeDocs', 'states', 'cities'));
    }

    public function search_pet(){
        $states         = State::orderBy('name', 'asc')->pluck('name', 'code');
        $cities         = City::orderBy('name', 'asc')->pluck('name', 'code');
        $typePets       = TypePet::orderBy('description', 'asc')->pluck('description', 'id');
        $subTypePets    = SubTypePet::orderBy('description', 'asc')->pluck('description', 'id');
        $process_id = 1;
        return view ('pet.search-pet', compact('process_id', 'states', 'cities', 'typePets', 'subTypePets'));
    }

    public function found_pet(){
        $states         = State::orderBy('name', 'asc')->pluck('name', 'code');
        $cities         = City::orderBy('name', 'asc')->pluck('name', 'code');
        $typePets       = TypePet::orderBy('description', 'asc')->pluck('description', 'id');
        $subTypePets    = SubTypePet::orderBy('description', 'asc')->pluck('description', 'id');
        
        $process_id = 2;
        return view ('pet.found-pet', compact('process_id', 'states', 'cities', 'typePets', 'subTypePets'));
    }

    
}
