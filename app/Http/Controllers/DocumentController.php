<?php

namespace App\Http\Controllers;

use App\Document;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class DocumentController extends Controller
{

    public function store(Request $request)
    { 
        // Validate
        $this->validate($request, [

        // Datos Document
        'title' => 'required|string',
        'description' => 'required|string',
        'author_id'=> 'required|integer',
        'user_id'=> 'integer', 
        'file' => 'mimes:pdf|required',
        'directory_id' => 'integer|required'    

        ]);

        //Upload file
        $fileName = $request->file('file')->getClientOriginalName();
        $destinationPath = '/storage/app/';
        $size = $request->file('file')->getSize();
        $mime = $request->file('file')->getMimeType();


        if($request->file('file')->move('../'.$destinationPath, $fileName)){;

        DB::beginTransaction();
        try {
               // Document
                $document = new Document;
                $document->title = $request->title;
                $document->description = $request->description;
                $document->author_id = $request->author_id;
                $document->user_id = $request->user_id;
                $document->save();
                $document_id = $document->id;
                
                //File
                $file = new File;
                $file->url = $destinationPath . $fileName;
                $file->document_id = $document_id;
                $file->mime = $mime;
                $file->size = $size;
                $file->directory_id = $request->directory_id;
                $file->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }
       return response()->json(['id' => $document->id ]);
    }

    public function show($user_id)
{
    $Document = Document::where('user_id','=',$user_id)->get();

    if (count($Document)>0) {
        return response()->json($Document);
    } else{
        return response()->json(['error' => 'doesnt exist.'], 400); 
    }
} 
}