<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forums = Forum::with('posts')->paginate(2);
        //dd($forums);
        return view('foros.index',compact('forums'));
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
        Forum::create(request()->all());

        return back()->with('message', ['success', __("Foro creado correctamente")]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        // Post::where('forum_id','=',$forum)->get();
        // SELECT * FROM post WHERE forum_id = $forum;
        $posts = $forum->posts()->with(['owner'])->paginate(2);
        
        return view('foros.detail',compact('forum','posts'));
        //return 'Funcionando jeje';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
        //
    }
}
