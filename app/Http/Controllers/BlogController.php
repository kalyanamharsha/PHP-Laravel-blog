<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Models\blog;
use Illuminate\Http\Request;
use App\Http\Requests\StoreblogRequest;
use App\Http\Requests\UpdateblogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogQuery= auth()->user()->blogs()->latest();


        if ($request->filled('status')) {
            $blogQuery->where('status', $request->status);
        }

        $blogs= $blogQuery->get();

        return BlogResource::collection( $blogs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreblogRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreblogRequest $request)
    {
        //
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        $input= $request->all();

        $input['slug']= str_slug($request->title);

        if($request->filled('published_at')) {
            $input['published_at'] = Carbon::parse($request->published_at);
        }


        $blog = auth()->user()->blogs()->create($input);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateblogRequest  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateblogRequest $request, blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        //
    }
}
