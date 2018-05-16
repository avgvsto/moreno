<?php

namespace App\Http\Controllers;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        try {

        $author = Author::where('id', $id)->firstOrFail();
        $author->delete();
        }catch (Exception $e){
            return "NO";
        }
    }

    public function index()
    {
        $author = Author::all();
         return Response()->json($author);

    }


    public function obtener($id){

        $author = Author::where('id',$id)->firstOrFail();

        return response()->json($author['name']);

    }

}
