<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;

class FriendbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Friend::latest()->paginate(5);
    
        return view('friends.index',compact('friends'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('friends.create');
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
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Friend::create($request->all());
     
        return redirect()->route('friends.index')
                        ->with('success','Friend created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        return view('friends.show',compact('friend'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        return view('friends.edit',compact('friend'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friend  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $friend->update($request->all());
    
        return redirect()->route('friends.index')
                        ->with('success','Friend updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        $friend->delete();
    
        return redirect()->route('friends.index')
                        ->with('success','Friend deleted successfully');
    }
}