<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


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
        $wines = $query->paginate(8);
        return view('wine/index', compact('wines', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makers = \App\Maker::all();
        return view('wine.create', compact('makers'));//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param WineRequest $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->action === 'back') {
            return redirect()->route('wine.index');
        } else {
            $wine = new \App\Wine;
            if ($request->hasFile('image_file')) {
                $image = $request->file('image_file');
                $fileName = $image->getClientOriginalName();
                $filePath = public_path('/wine_images/'.$fileName);
                Image::make($image->getRealPath())->resize(540, 400)->save($filePath);
                $wine->image_file = $fileName;
            }
            $wine->name = $request->name;
            $wine->country = $request->country;
            $wine->kind = $request->kind;
            $wine->type = $request->type;
            $wine->area = $request->area;
            $wine->maker_id = $request->maker_id;
            $wine->color = $request->color;
            $wine->taste = $request->taste;
            $wine->aroma = $request->aroma;
            $wine->comment = $request->comment;
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
        $wine = \App\Wine::find($id);
        return view('wine.show', compact('wine'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wine = \App\Wine::find($id);
        $makers = \App\Maker::all();
        return view('wine.edit', compact('wine', 'makers'));//
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
            if ($request->hasFile('image_file')) {
                $image = $request->file('image_file');
                $fileName = $image->getClientOriginalName();
                $filePath = public_path('/wine_images/'.$fileName);
                Image::make($image->getRealPath())->resize(540, 400)->save($filePath);
                $wine->image_file = $fileName;
            }
            $wine->name = $request->name;
            $wine->country = $request->country;
            $wine->kind = $request->kind;
            $wine->type = $request->type;
            $wine->area = $request->area;
            $wine->maker_id = $request->maker_id;
            $wine->color = $request->color;
            $wine->taste = $request->taste;
            $wine->aroma = $request->aroma;
            $wine->comment = $request->comment;
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
