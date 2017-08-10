<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;
use App\State;
use App\City;
use App\TypePet;
use App\SubTypePet;
use Storage;
use App\ProcessType;
use Auth;
use App\Http\Requests\PetRequest;
use Laracasts\Flash\Flash;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pe = $_GET['pet'];
        $encontre;
        if($pe==2){
            $encontre = "encontrado animal";
            $pets = Pet::where('user_id', '=', Auth::user()->id)->get();  
            return view('prueba', compact('pets','encontre'));
        }else{
             $encontre="perdido animal";
             $pets = Pet::where('owner_id', '=', Auth::user()->id)->get();
             return view('prueba', compact('pets','encontre'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states         = State::orderBy('name', 'asc')->pluck('name', 'code');
        $cities         = City::orderBy('name', 'asc')->pluck('name', 'code');
        $typePets       = TypePet::orderBy('description', 'asc')->pluck('description', 'id');
        $subTypePets    = SubTypePet::orderBy('description', 'asc')->pluck('description', 'id');
        $processes      = ProcessType::orderBy('description', 'asc')->pluck('description', 'id');

        return view ('pet.create', compact('states', 'cities', 'typePets', 'subTypePets', 'processes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetRequest $request)
    {
        // dd($request->all());
        $pet = new Pet();

        //Saving image
        if ($request->hasFile('imagen') && $request->imagen->isValid()){
            $imagen = $request->file('imagen');

            $nameImagen = 'aliza_' . time() . '.' . $imagen->getClientOriginalExtension();
            
            $path = Storage::putFileAs('public', $request->file('imagen'), $nameImagen);

            if ($path){
                $pet->imagen = $nameImagen;
            }else{
                // Return an error, telling there was an error saving image
            }
        }

        if ($request->process_id == 1){
            $pet->owner_id = Auth::user()->id;
        }
        $pet->user_id       = Auth::user()->id;
        $pet->process_id    = $request->process_id;
        $pet->type_id       = $request->type_id;
        $pet->subtype_id    = $request->subtype_id;
        $pet->name          = $request->name;
        $pet->condition     = $request->condition;
        $pet->notes         = $request->notes;
        $pet->place         = $request->place;
        $pet->colors        = $request->colors;
        $pet->state_id      = $request->state_id;
        $pet->city_id       = $request->city_id;

            // dd($pet);

        if($request->process_id==2){

            if($pet->save()){

                 Flash::success("Su solicitud se a guardado")->important();
                 return redirect()->route('pet.index',['pet'=>$request->process_id]);

            }else{

                 Flash::warning("Ups!!!, hubo un problema al guardar su peticion")->important();
                 return back();
             }

        }else{

             if($request->name==null){ 

            Flash::error("¡¡El campo 'Nombre De Tu Mascota' es obligatorio!!")->important();
            return back();

        }else{ 

            if($pet->save()){

                 Flash::success("Su solicitud se a guardado")->important();
                 return redirect()->route('pet.index',['pet'=>$request->process_id]);

            }else{

                 Flash::warning("Ups!!!, hubo un problema al guardar su peticion")->important();
                 return back();
             }
        }   


        }
       

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
