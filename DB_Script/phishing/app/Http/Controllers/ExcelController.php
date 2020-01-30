<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Url;
use App\Imports\UrlImport;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'url' => 'required|file',
        ]);
        // dd($request->all());
        Excel::import(new UrlImport, $request->file('url'));        
        return back()->with('success', 'Uploaded Successfully!');
    }
}
