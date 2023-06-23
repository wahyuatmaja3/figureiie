<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Figure;
use App\Models\Franchise;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index', [
            "figures" => Figure::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials = [
            [
                "id" => "0",
                "name" => "PVC"
            ],
            [
                "id" => "1",
                "name" => "Metal"
            ],
            [
                "id" => "2",
                "name" => "Resin"
            ],
            [
                "id" => "3",
                "name" => "ABS"
            ],
            [
                "id" => "4",
                "name" => "Vinyl"
            ],
        ];
        return view('admin.product.create',[
            "brands" => Brand::all(),
            "franchises" => Franchise::all(),
            "categories" => Category::all(),
            "materials" => $materials
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            "name" => "required|unique:figures,name|min:10",
            "price" => "required|integer|min:1000",
            "chara" => "required",
            "stock" => "required|integer|min:0",
            "size" => "required|integer",
            "material" => "required",
            "brand_id" => "required|exists:brands,id",
            "franchise_id" => "required|exists:franchises,id",
            "category_id" => "required|exists:categories,id",
        ]);

        // if ($request->file('img')) {
        //     $validatedData['img'] = $request->file('img')->store('figure-images');
        // }

        
        $validatedData['slug'] = Str::slug($validatedData['name'], '-');
        
        $newFigure = Figure::create($validatedData);
        
        if ($request->has("images")) {
            foreach ($request->file('images') as $image) {
                $imageName = $validatedData['name'] . 'image' . time() . rand(1,100) . '.' . $image->extension();
                $image->storeAs('figure-images', $imageName);
                ProductImage::create([
                    "figure_id" => $newFigure->id,
                    "name" => $imageName
                ]);
            }
        }

        return redirect('/admin/products')->with('success', 'New figures has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Figure $figure)
    {
        return view('admin.product.edit',[
            "figure" => $figure,
            "brands" => Brand::all(),
            "franchises" => Franchise::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Figure $figure)
    {
        if ($figure->img) {
            Storage::delete($figure->img);
        }
        Figure::destroy($figure->id);

        return redirect('/admin/products')->with('success', 'Figure deleted succesfully!');
    }
}
