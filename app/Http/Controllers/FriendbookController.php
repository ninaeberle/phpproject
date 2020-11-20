<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;

//The controller which contains the functions for this application


class FriendbookController extends Controller
{
    /**
     * display a listing of the friends
     * multiple pages -> friends are seperated in multiple pages when more then 5 friends have been created
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
     * show the form for creating a new friend
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('friends.create');
    }
    
    /**
     * store function to save a new created person in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'zodiacsign' => 'required',
            'hobbies' => 'required',
            'socialmedia' => 'required',


        ]);
    
        Friend::create($request->all());
     
        return redirect()->route('friends.index')
                        ->with('success','Friend created successfully.');
    }
     
    /**
     * display function to display the specified resource
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        return view('friends.show',compact('friend'));
    } 
     
    /**
     * show function to show the form for editing the specified resource
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        return view('friends.edit',compact('friend'));
    }
    
    /**
     * update function to update the specified resource in storage after beeing edited
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
     * remove function to delete the specified resource from the storage
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


    //search function to search specific friend in your table
    public function search(Request $request) {
        $friends = $request->get('search');
        $friends = Friend::where('name', 'like', '%' .$friends. '%')->paginate(5);
        return view('friends.index', ['friends' => $friends]);
    }
    
}