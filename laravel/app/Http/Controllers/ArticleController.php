<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
    	return Article::all();
    }

    public function show($id)
    {
        $data = Article::find($id);

        if(!empty($data))
        {
        	return response()->json([
        		'status'=>1,
                'Messege' => 'success',
                'result' => $data
            ],200);
        }
        else
        {
        	return response()->json([
        		'status'=>0,
                'Messege' => 'No record found',
                'result' => array()
            ],200);
        }

        
    }

    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }


}
