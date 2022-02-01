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
        $product = Product::with('photos')->find($id);
        $categories = CategoryService::getAllCategories();
        return view('product_edit', ['product' => $product,'categories' => $categories]);
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
        $product = Product::findOrFail($id);
        $product_name_new = $request->input('product_name_edit');
        $code_new = $request->input('code_edit');
        $description_new = $request->input('description_edit');
        $price_new = $request->input('price_edit');
        $category_new = $request->input('categories_edit');
        $id_product = $product->id;

        $product->name =  $product_name_new;
        $product->code = $code_new;
        $product->description = $description_new;
        $product->price = $price_new;
        $product->category_id = $category_new;
        $product->save();

        if ($request->file('images_edit') !== NULL) {
            foreach ($request->file('images_edit') as $imagefileNew) {
                $image = new Photo();
                $date = date_create();
                $time = date_format($date, 'YmdHis');
                $imageName = $time . '-' . $imagefileNew->getClientOriginalName();
                $imagefileNew->move(base_path() . '/public/uploads/', $imageName);
                $image->image = $imageName;
                $image->product_id = $id_product;
                $image->save();
            }
        }

        return redirect('/products');
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
