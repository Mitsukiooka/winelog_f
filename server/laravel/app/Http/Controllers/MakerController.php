<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $query = \App\Maker::query();
        if (!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        $makers = $query->paginate(8);
        return view('maker/index', compact('makers', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maker.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->action === 'back') {
            return redirect()->route('maker.index');
        } else {
            $maker = new \App\Maker;
            if ($request->hasFile('image_file')) {
                $file = $request->image_file;
                $fileName = $file->getClientOriginalName();
                $filePath = public_path('/maker_images');
                $file->move($filePath, $fileName);
                $maker->image_file = $fileName;
            }
            $maker->name = $request->name;
            $maker->country = $request->country;
            $maker->save();
            return redirect()->route('maker.index');
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
        $maker = \App\Maker::find($id);
        return view('maker.show', compact('maker'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maker = \App\Maker::find($id);
        return view('maker.edit', compact('maker'));//
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
            return redirect()->route('maker.index');
        } else {
            $maker = \App\Maker::find($id);
            if ($request->hasFile('image_file')) {
                $file = $request->image_file;
                $fileName = $file->getClientOriginalName();
                $filePath = public_path('/maker_images');
                $file->move($filePath, $fileName);
                $maker->image_file = $fileName;
            }
            $maker->name = $request->name;
            $maker->country = $request->country;
            $maker->save();
            return redirect()->route('maker.index');
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
        $maker = \App\Maker::find($id);
        $maker->delete();
        return redirect()->route('maker.index');
    }
}
