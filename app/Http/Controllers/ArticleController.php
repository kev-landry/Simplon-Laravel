<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $articles = Article::all();
	    $articles = Article::orderBy('id', 'DESC')->simplePaginate(5);

	    $keyword = Input::get('keyword', '');
	    $articles_found = Article::SearchKeyword($keyword)->get();

        return view('article.index', compact('articles','keyword', 'articles_found'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
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
		    'title' => 'bail|required|unique:articles|max:50',
		    'content' => 'required|max:50',
		    'is_enabled' => 'required|boolean'
	    ]);

	    Article::insert([
		    'title' => $request->title,
		    'content' => $request->content,
		    'is_enabled' => $request->is_enabled,
		    'slug' => str_slug($request->title)
	    ]);

	    return redirect()->route('articles.index')->with('success', 'L\'article a bien été ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
	    $article = Article::where('slug', $slug)->first();

//	    $article = Article::find($id);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
	    $article = Article::where('slug', $slug)->first();

	    return view('article.edit', compact('article'));
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
	    $this->validate($request, [
		    'title' => 'required',
		    'content' => 'required',
		    'is_enabled' => 'required',
	    ]);

	    Article::find($id)->update([
		    'title' => $request->title,
		    'content' => $request->content,
		    'is_enabled' => $request->is_enabled,
		    'slug' => str_slug($request->title)
	    ]);

	    return redirect()->route('articles.index')->with('success', 'L\'article a bien été édité !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    Article::find($id)->delete();
	    return redirect()->route('articles.index')->with('success', 'L\'article a bien été effacé !');
    }
}
