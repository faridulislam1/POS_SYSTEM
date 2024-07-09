<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\categories;

class ProductController extends Controller
{
    protected $product;
    public function __construct(){
        $this->product = new Product();

    }
    public function index()
    {
        $products= $this->product->all();
        $categories= categories::pluck('category','id');
        $brands= Brand::pluck('brand','id');
        return view('product.index',compact('products','brands','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          
        $this->product->create($request->all());
    
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->product->find($id);
        $product->delete();
        return redirect('product');
    }
}
