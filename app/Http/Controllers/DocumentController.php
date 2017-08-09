<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use App\TypeDoc;
use App\State;
use App\City;
use App\ProcessType;
use Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::where('owner_id', '=', Auth::user()->id)->get();
        // dd($documents);
        return view('document.index', compact('documents'));
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
    public function store(Request $request)
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

        $document->save();
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
