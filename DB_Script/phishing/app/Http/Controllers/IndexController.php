<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Url;


class IndexController extends Controller
{
    public function index(Request $request) {
        $data = Url::paginate(15);
        return view('index', compact('data'));
    }

    public function url_delete($id) {
        Url::destroy($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
