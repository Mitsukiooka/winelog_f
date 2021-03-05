<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');//
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
            return redirect()->route('profile.index');
        } else {
            $profile = new \App\Profile;
            if ($request->hasFile('image_file')) {
                $image = $request->file('image_file');
                $fileName = $image->getClientOriginalName();
                $filePath = public_path('/profile_images/'.$fileName);
                Image::make($image->getRealPath())->resize(540, 350)->save($filePath);
                $profile->image_file = $fileName;
            }
            $profile->favoriteWine = $request->favoriteWine;
            $profile->favoriteMaker = $request->favoriteMaker;
            $profile->twitter = $request->twitter;
            $profile->instagram = $request->instagram;
            $profile->facebook = $request->facebook;
            $profile->user_id = Auth::id();
            $profile->save();
            return redirect()->route('profile.show', $profile->id);
        }//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $profile = \App\Profile::find($user_id);
        return view('profile.show', compact('profile'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = \App\Profile::find($id);
        return view('profile.edit', compact('profile'));//
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
            return redirect()->route('profile.index');
        } else {
            $profile = \App\Profile::find($id);
            if ($request->hasFile('image_file')) {
                $image = $request->file('image_file');
                $fileName = $image->getClientOriginalName();
                $filePath = public_path('/profile_images/'.$fileName);
                Image::make($image->getRealPath())->resize(540, 350)->save($filePath);
                $profile->image_file = $fileName;
            }
            $profile->favoriteWine = $request->favoriteWine;
            $profile->favoriteMaker = $request->favoriteMaker;
            $profile->twitter = $request->twitter;
            $profile->instagram = $request->instagram;
            $profile->facebook = $request->facebook;
            $profile->save();
            return redirect()->route('profile.show', $profile->id);
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
        $profile = \App\Profile::find($id);
        $profile->delete();
        return redirect()->route('/');
    }
}