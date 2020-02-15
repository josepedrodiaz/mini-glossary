<?php

namespace App\Http\Controllers;

use App\MiniGlossary;
use App\Language;
use Illuminate\Http\Request;

use DB;

class MiniGlossaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mini_glossaries = MiniGlossary::all();
        return view('mini-glossary.index',compact('mini_glossaries'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = DB::table('languages')->pluck('name','id');
        return view('mini-glossary.create', compact('languages'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'language_id' => 'required',
        ]);
        
        $user = auth()->user();
        $user_id = $user->id;

        $mini_glossary = new MiniGlossary([
            'user_id'=>$user_id,
            'language_id'=>$request->get('language_id'),
            'name'=>$request->get('name'),
        ]);

        $mini_glossary->save();
        
        return view('home')->with('ok_message', 'New Mini Glossary was created! You can continue <a href="/terms/create">Adding Terms to your new Mini Glossary</a>');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MiniGlossary  $miniGlossary
     * @return \Illuminate\Http\Response
     */
    public function show(MiniGlossary $miniGlossary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MiniGlossary  $miniGlossary
     * @return \Illuminate\Http\Response
     */
    public function edit(MiniGlossary $miniGlossary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MiniGlossary  $miniGlossary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MiniGlossary $miniGlossary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MiniGlossary  $miniGlossary
     * @return \Illuminate\Http\Response
     */
    public function destroy(MiniGlossary $miniGlossary)
    {
        //
    }
}
