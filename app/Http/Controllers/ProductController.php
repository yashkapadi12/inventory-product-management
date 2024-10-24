<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {   
        // Search and filter query
        $query = Product::query();
        
        // Search by name, sku, description
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('sku', 'like', '%' . $request->search . '%');
            });
        }
        // Filter by stock less than 10
        if ($request->has('low_stock') && $request->low_stock) {
            $query->where('quantity', '<', 10);
        }
        // Paginate the results (10 products per page)
        $products = $query->paginate(10);
        
        return view('product.index', compact('products'));
    }
    


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }


    // Show the form for creating a new product.
    public function create()
    {
        return view('product.create');
    }

    // Store a newly created product.
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'sku' => 'required|string|unique:products,sku',
                'quantity' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
            ]);

            Product::create($request->all());
            session()->flash('success', 'Product Created successfully!');

        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            \Log::error('Login error: ' . $e->getMessage());
            return redirect()->route('product.create')->withInput();
        }

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    // Show the form for editing the specified product.
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    // Update the specified product in storage.
    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'sku' => 'required|string|unique:products,sku,' . $product->id,
                'quantity' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
            ]);

            $product->update($request->all());
            session()->flash('success', 'Product Updated successfully!');
            return redirect()->route('product.index');

        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            \Log::error('Login error: ' . $e->getMessage());
            return redirect()->route('product.create')->withInput();
        }

    }
    public function downloadCSV()
    {
        $products = Product::all();

        // Create a CSV file in memory
        $handle = fopen('php://output', 'w');

        // Get the current timestamp
        $timestamp = now()->format('Y-m-d_H-i-s'); // Format: YYYY-MM-DD_HH-MM-SS

        // Set the headers for the CSV file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="product_list_' . $timestamp . '.csv"');

        // Add the column headers to the CSV
        fputcsv($handle, ['Name', 'SKU', 'Quantity', 'Price', 'Description']);

        // Add each product's data to the CSV
        foreach ($products as $product) {
            fputcsv($handle, [
                $product->name,
                $product->sku,
                $product->quantity,
                $product->price,
                $product->description
            ]);
        }
        fclose($handle);
        exit();
    }
    // Remove the specified product.
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('error', 'Product deleted successfully.');
    }
}
