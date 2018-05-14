<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Author;


class AuthorController extends Controller
{

    public function store(Request $request)
    {

        // Validate
        $this->validate($request, [
            'name' => 'required|string',
            'last_name' => 'required|string'
        ]);

        $author = new Author;
        $author->name = $request->name;
        $author->last_name = $request->last_name;
        try {
            $author->save();
        } catch (QueryException $e) {
            if (!$e->errorInfo[1] == 1062) {
                return;
            }
            return response()->json([
                'name' => ['The name and last name are duplicate.'],
                'last_name' => ['The name and last name are duplicate.']
            ], 409);
        }

        return response()->json(['id' => $author->id]);
    }

}
