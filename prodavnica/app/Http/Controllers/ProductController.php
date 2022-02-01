<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Product;
use App\Providers\CategoryService;
use App\Providers\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductService::getAllProducts();
        $categories = CategoryService::getAllCategories();
        return view('products', [
            'products' => $products,
            'session' => session()->get('user'),
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_name = $request->input('product_name');
        $code = $request->input('code');
        $description = $request->input('description');
        $price = $request->input('price');
        $category = $request->input('categories');
        
        $product = new Product();
        $product->name = $product_name;
        $product->code = $code;
        $product->description = $description;
        $product->price = $price;
        $product->category_id = $category;
        $product->save();
        $id_new_product = $product->id;

        foreach ($request->file('images') as $imagefile) {
            $image = new Photo();
            $date = date_create();
            $time = date_format($date, 'YmdHis');
            $imageName = $time . '-' . $imagefile->getClientOriginalName();
            $imagefile->move(base_path() . '/public/uploads/', $imageName);
            $image->image = $imageName;
            $image->product_id = $id_new_product;
            $image->save();
        }

        return redirect()->back();
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
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $photos = Photo::where('product_id', '=', $id)->get();
        foreach ($photos as $photo) {
            $photo->delete();
        }
        $product->delete();
    }
}
