<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = todo::All();
        if (!empty($todos)) {
            return Response()->json($todos);
        } else {
            return Response()->json([
                "Erreur lors de l'affichage"
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todos = todo::create($request->all());
        return Response()->json([
            "Data created successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (todo::where("id", $id)->exist()) {
            $todos = todo::where("id", $id);
            $todos->nom = is_null ? $todos->nom : $request->nom;
            $todos->description = is_null ? $todos->description : $request->description;
            $todos->status = is_null ? $todos->status : $request->status;

            $todos->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todo $todo)
    {
        //
    }
}
