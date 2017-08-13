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
    public function __construct()
    {
        // $this->middleware('auth')->except('index');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (isset($_GET['pro'])){
            $process = $_GET['pro'];

            // Flash::success("Su solicitud se a guardado")->important(); 
            if($process==2){
                $pets = Pet::where('user_id', '=', Auth::user()->id)
                            ->where('process_id', '=', '2')
                            ->orderBy('id', 'desc')->get();
                // $encontre = 'encontre';
                return view('pet.my-found-list', compact('pets'));
                
            }else{
                $pets = Pet::where('owner_id', '=', Auth::user()->id)
                            ->where('process_id', '=', '1')
                            ->orderBy('id', 'desc')->get();
                // $encontre="perdi";
                return view('pet.my-missed-list', compact('pets'));

            }
        }else{
            // dd('Prohibido');
            $pets = Pet::where('user_id', '=', Auth::user()->id)
                        ->where('process_id', '=', '1')
                        ->orderBy('id', 'desc')->get();
            // $encontre="perdi";
            return view('pet.my-missed-list', compact('pets'));
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
        if ($request->process_id==2){
             if($request->name==null){ 
                Flash::error("¡¡El campo 'Nombre De Tu Mascota' es obligatorio!!")->important();
                return back();
            } 
        }

        // dd($request->all());
        $pet = new Pet();

        //Saving image
        if ($request->hasFile('imagen') && $request->imagen->isValid()){
            $imagen = $request->file('imagen');

            $nameImagen = 'aliza_' . time() . '.' . $imagen->getClientOriginalExtension();
            //TODO validar extencion de archivo debe ser solo imagen, el request no funciona aun
            
            $path = Storage::putFileAs('public', $request->file('imagen'), $nameImagen);

            if ($path){
                $pet->imagen = $nameImagen;
            }else{
                // Return an error, telling there was an error saving image
            }
        }else{
            Flash::error("¡¡Debe adjuntar una imagen de la mascota!!")->important();
                return back();
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
        

        if($pet->save()){
            Flash::success("Su solicitud se a guardado")->important();
            return redirect()->route('pet.index',['pro'=>$request->process_id]);
        }else{
            Flash::warning("Ups!!!, hubo un problema al guardar su peticion")->important();
            return back();
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
