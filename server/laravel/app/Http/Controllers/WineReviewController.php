<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WineReviewController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($wine_id)
    {
        $wine = \App\Wine::find($wine_id);
        return view('review.create', compact('wine'));//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @return Response
     */
    public function store(Request $request, $wine_id)
    {
        if($request->action === 'back') {
            return redirect()->route('review.create');
        } else {
            $wine = \App\Wine::find($wine_id);
            $review = new \App\Review;
            $review->user_id = Auth::id();
            $review->wine_id = $wine->id;
            $review->comment = $request->comment;
            $review->save();
            return redirect()->route('wine.show', $review->wine_id);
        }//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($wine_id, $id)
    {   
        $wine = \App\Wine::find($wine_id);
        $review = \App\Review::find($id);
        return view('review.edit', compact('wine', 'review'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $wine_id, $id)
    {
        if($request->action === 'back') {
            return redirect()->route('review.edit', $id);
        } else {
            $wine = \App\Wine::find($wine_id);
            $review = \App\Review::find($id);
            $review->comment = $request->comment;
            $review->save();
            return redirect()->route('wine.show', $review->wine_id);
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
        $profile = \App\Review::find($id);
        $profile->delete();
        return redirect()->route('/');
    }
}
