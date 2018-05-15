<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;


class AuthorController extends Controller
{

    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'name' => 'required|string',
            'last_name' => 'required|string'
        ]);

        // Action
        $author = new Author;
        $author->name = $request->name;
        $author->last_name = $request->last_name;
        $author->save();

        return response()->json(['id' => $author->id]);
    }
    public function destroy($id)
    {

        Author::destroy($id);
        /*
        !!No se encuentran los metodos!!
        $author= Author::find($id);
        $author->delete();
        */


        return "ok";
    }

    public function index()
    {
        $author=Author::all();


        return $author;
    }

}
