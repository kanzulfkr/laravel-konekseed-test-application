<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        // get products get all or search by category_id pagination
        $products = Product::when($request->name, function ($query) use ($request) {
            return $query->where('name', $request->name);
        })
            ->get();
        return response()->json([
            'message' => 'Success',
            'data' => $products
        ], 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
