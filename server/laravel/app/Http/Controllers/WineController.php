<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $query = \App\Wine::query();
        if (!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        $wines = $query->get();
        return view('wine/index', compact('wines', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wine.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->action === 'back') {
            return redirect()->route('wine.index');
        } else {
            $wine = new \App\Wine;
            $wine->name = $request->name;
            $wine->country = $request->country;
            $wine->kind = $request->kind;
            $wine->type = $request->type;
            $wine->save();
            return redirect()->route('wine.index');
        }//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wines = \App\Wine::find($id);
        return view('wine.show', compact('wines'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wines = \App\Wine::find($id);
        return view('wine.edit', compact('wines'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->action === 'back') {
            return redirect()->route('wine.index');
        } else {
            $wine = \App\Wine::find($id);
            $wine->name = $request->name;
            $wine->country = $request->country;
            $wine->kind = $request->kind;
            $wine->type = $request->type;
            $wine->save();
            return redirect()->route('wine.index');
        }//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wine = \App\Wine::find($id);
        $wine->delete();
        return redirect()->route('wine.index');
    }
}
