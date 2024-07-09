<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use DB;

use App\Models\Product;

class SaleController extends Controller
{
    protected $sale;
    public function __construct(){
        $this->sale = new Sales();

    }
    public function index()
    {
        $response['sales'] = $this->sale->all();
        return view('sale.index')->with($response);
    }

    public function search(Request $request)
    {
        $query = $request->input('barcode');
        $products = Product::where('id', 'like', '%' . $query . '%')->get();
        return response()->json($products);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $this->sale->create($request->all());
    
        return redirect()->back();

        // $validatedData = $request->validate([
        //     'total' => 'required|numeric',
        //     'pay' => 'required|numeric',
        //     'balance' => 'required|numeric',
             
        // ]);

        // try {
        //     DB::transaction(function () use ($validatedData) {
        //         // Create a new Sales record
        //         $salea = Sales::create([
        //             'total' => $validatedData['total'],
        //             'pay' => $validatedData['pay'],
        //             'balance' => $validatedData['balance'], 
        //             // Add other fields
        //             // Example: 'customer_id' => $validatedData['customer_id'],
        //         ]);
   
        //         // Save related data if necessary
        //         // Example: $sales->items()->createMany($validatedData['items']);
        //     });

        //     return response()->json(['success' => 'Sales record created successfully'], 201);

        // } catch (\Exception $e) {
        //     // Handle the exception
        //     return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        // }
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
        //
    }

}