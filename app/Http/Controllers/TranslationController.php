<?php

namespace App\Http\Controllers;

use App\Translation;
use App\MiniGlossary;
use App\Term;
use Illuminate\Http\Request;

use DB;

class TranslationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display translation panel
     */
    public function translator( $mini_glossary_id ){
        $mini_glossary = MiniGlossary::find($mini_glossary_id);
        return view('translator.index',compact('mini_glossary'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $term_id )
    {
        $languages = DB::table('languages')->pluck('name','id');
        $term = Term::find($term_id);
        return view('translation.create',compact('languages','term'));
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
            'translation' => 'required|max:191',
            'language_id' => 'required',
            'term_id' => 'required',
        ]);

        $translation = new Translation([
            'term_id'=>$request->get('term_id'),
            'language_id'=>$request->get('language_id'),
            'translation'=>$request->get('translation'),
        ]);
        
        $user = auth()->user();
        $user_id = $user->id;
        $translation->translator = $user_id;

        $term = Term::find($request->get('term_id'));

        if($term->miniGlossary->user_id == $user_id ){
            $translation->approved = 1;
        }

        $translation->save();
        
        return redirect('/translator/' . $term->miniGlossary->id)->with('ok_message', 'Translation added');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function show(Translation $translation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function edit(Translation $translation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Translation $translation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Translation $translation)
    {
        //
    }
}
