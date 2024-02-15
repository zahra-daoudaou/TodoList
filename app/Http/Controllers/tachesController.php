<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tache;

class tachesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filter = $request->query('filter');

        if ($filter === 'terminé') {
            $taches = tache::where('etat', 'termine')->paginate(10);
        } elseif ($filter === 'non terminé') {
            $taches = tache::where('etat', 'non termine')->paginate(10);
        } else {
            $taches = tache::paginate(10);
        }

        /*if(request ('search')){
            $taches=tache::where('titre','like','%'.request('search').'%')->get();
        }else{
            $taches=tache::all();
        }*/

        return view('index', ['taches' => $taches, 'filter' => $filter]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'titre'=>'required | string',
            'description'=>'required | string',
            'etat'=>'required | string'
        ]);
        $newTache=tache::create($data);
        return redirect(route('taches.index'))->with('success','Tache est ajouter!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
            /*$tache = tache::findOrFail($id);
            return view('modifier', ['tache' => $tache]);*/
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tache $tache , $id)
    {
        $tache=tache::findOrFail($id);
        return view('modifier',['tache'=>$tache]) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(tache $tache, Request $request, $id)
    {
        $tache=tache::findOrfail($id);
        $data=$request->validate([
            'titre'=>'required | string',
            'description'=>'required | string',
            'etat'=>'required | string'
        ]);
        $tache->update($data);
        return redirect(route('taches.index'))->with('success','Tache est modifier!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tache=tache::findOrFail($id);
        $tache->delete();
        return redirect(route('taches.index'))->with('success','Tache est supprimer!') ;
    }
}
