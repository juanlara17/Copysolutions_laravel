<?php

namespace App\Http\Controllers;

use App\FileEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class FileEntryController extends Controller
{
    public function index()
    {
        $files = FileEntry::all();
//        return $files;

        return view('pages.index', compact('files'));
    }

    public function create()
    {
        $files_up = FileEntry::all();
        return view('pages.create', compact('files_up'));
    }


    public function uploadFile(Request $request)
    {
//        @dump($request->all());
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
//        $path = hash('sha256', time());
        $path = time();
        $fileP = $path . $filename;

        if (Storage::disk('local')->put('/files/uploads/'.$fileP, File::get($file))) {

            $input = [
                'filename' => $filename,
                'mime' => $file->getClientMimeType(),
                'path' => $path,
                'size' => $file->getSize(),
            ];
            $file = FileEntry::create($input);
//            return $input['filename'];
            return response()->json([
                'success' => true,
                'id' => $file->id
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }

    public function destroy($id)
    {
        $file = FileEntry::findOrFail($id);
        if(Storage::disk('local')->delete('/files/uploads/'.$file->path.$file->filename)){
            $file->delete();
            return response()->json([
                'success' => true,
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }
}
