<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Figure;

class FigureController extends Controller
{
    public function detail(Figure $figure) {
        // dd($figure->images);
        return view('product/detail', [
            'figure' => $figure,
            'figures' => Figure::take(8)->get(),
            "images" => $figure->images()->get()
        ]);
    }

    public function search(Request $request) {
        if ($request->has('keyword')) {
            $figures = Figure::where('name', 'LIKE', '%' . $request->keyword . '%')->get();
        } else {
            $figures = Figure::all();
        }

        return view('product/search',[
            'figures' => $figures,
            'keyword' => $request->keyword
        ]);
        
    }
}
