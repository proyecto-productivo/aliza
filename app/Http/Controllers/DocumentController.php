<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use App\TypeDoc;
use App\State;
use App\City;
use App\ProcessType;
use Auth;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\DocumentRequest;
use App\Notifications\PostCreated;

class DocumentController extends Controller
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
                $documents = Document::where('user_id', '=', Auth::user()->id)
                            ->where('process_id', '=', '2')
                            ->orderBy('id', 'desc')->get();
                // $encontre = 'encontre';
                return view('document.my-found-list', compact('documents'));
                
            }else{
                $documents = Document::where('owner_id', '=', Auth::user()->id)
                                    ->where('process_id', '=', '1')
                                    ->orderBy('id', 'desc')->get();
                // $encontre="perdi";
                return view('document.my-missed-list', compact('documents'));

            }
        }else{
            // dd('Prohibido');
            $documents = Document::where('owner_id', '=', Auth::user()->id)
                                    ->where('process_id', '=', '1')
                                    ->orderBy('id', 'desc')->get();
                // $encontre="perdi";
                return view('document.my-missed-list', compact('documents'));
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeDocs       = TypeDoc::orderBy('description', 'asc')->pluck('description', 'id');
        $states         = State::orderBy('name', 'asc')->pluck('name', 'code');
        $cities         = City::orderBy('name', 'asc')->pluck('name', 'code');
        $processes      = ProcessType::orderBy('description', 'asc')->pluck('description', 'id');

        return view('document.create', compact('typeDocs', 'states', 'cities', 'processes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        $document = new Document();

        if ($request->process_id == 1){
            $document->owner_id = Auth::user()->id;
        }

        $document->user_id       = Auth::user()->id;
        $document->process_id    = $request->process_id;
        $document->type_id       = $request->type_id;
        $document->entity        = $request->entity;
        $document->number        = $request->number;
        $document->name          = $request->name;
        $document->notes         = $request->notes;
        $document->place         = $request->place;
        $document->state_id      = $request->state_id;
        $document->city_id       = $request->city_id;

        // proces_id 1 es perdio 2 es encontro

        if ($request->name == null){
            Flash::error("¡¡El campo 'Nombre En Documento' es obligatorio!!")->important();
            return back();
        }else if ($document->save()){

            //Notificacion
            $user = User::find(Auth::user()->id);
            $user->notify(new PostCreated($mensaje = 'Se ha creado su publicación'));

            return redirect()->route('document.index',['pro'=>$request->process_id]);
            
        }else{
            Flash::warning("Ups!!!, hubo un problema al guardar su peticion")->important();
            return back();
        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
