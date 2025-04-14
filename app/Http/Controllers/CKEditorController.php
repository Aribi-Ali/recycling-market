<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Store the file in the public disk (or any disk you prefer)
            $path = $file->storeAs('uploads', $fileName, 'public');

            return response()->json([
                'url' => Storage::url($path),
                'uploaded' => 1,
                'fileName' => $fileName
            ]);
        }

        return response()->json([
            'uploaded' => 0,
            'error' => [
                'message' => 'File could not be uploaded.'
            ]
        ]);
    }
}