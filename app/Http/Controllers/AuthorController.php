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
            $autor = Author::where('id','=',$id)->get();

            if (count($autor)>0){
                $author = Author::where('id', $id)->firstOrFail();
                $author->delete();
                return response()->json(['id' => $author->id]);
            }else{
                return response()->json(['error' => 'Not Found'], 404);
            }

        }catch(Exception $e){

        }
    }

    public function index()
    {
        $authors = Author::all();
         return response()->json($authors);

    }

}
