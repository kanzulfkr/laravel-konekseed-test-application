<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessTarget;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessTargetController extends Controller
{

    public function index(Request $request)
    {
        $business_targets = DB::table('business_targets')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->join('businesses', 'business_targets.business_id', '=', 'businesses.id')
            ->join('products', 'business_targets.product_id', '=', 'products.id')
            ->select('businesses.name as business_name', 'products.name as product_name', 'business_targets.id', 'business_targets.name', 'business_targets.business_id', 'business_targets.product_id', 'business_targets.name', 'business_targets.category', 'business_targets.weight', 'business_targets.start_date', 'business_targets.end_date', 'business_targets.status')
            ->orderBy('business_targets.id', 'desc')
            ->paginate(10);
        return view('pages.target.index', compact('business_targets'));
    }

    public function create()
    {
        $products = Product::all();
        $business = Business::all();
        return view('pages.target.create', compact('products', 'business'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'business_id' => 'required',
            'product_id' => 'required',
            'category' => 'required|in:Quantitative,Qualitative',
            'weight' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:To do,In progress,Done',
        ]);

        $businessTarget = new BusinessTarget();
        $businessTarget->name = $request->name;
        $businessTarget->business_id = $request->business_id;
        $businessTarget->product_id = $request->product_id;
        $businessTarget->category = $request->category;
        $businessTarget->weight = $request->weight;
        $businessTarget->start_date = $request->start_date;
        $businessTarget->end_date = $request->end_date;
        $businessTarget->status = $request->status;
        $businessTarget->save();


        return redirect()->route('targets.index')->with('success', 'Targets created successfully.');
    }

    public function show($id)
    {
        $business = Business::find($id);
        return view('pages.target.show', compact('businesses'));
    }

    public function edit($id)
    {
        $businesses = Business::all();
        $products = Product::all();
        $businessTarget = BusinessTarget::find($id);
        return view('pages.target.edit', compact('businesses', 'products'))->with('businessTarget', $businessTarget);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'business_id' => 'required',
            'product_id' => 'required',
            'category' => 'required|in:Quantitative,Qualitative',
            'weight' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:To do,In progress,Done',
        ]);

        $businessTarget = BusinessTarget::find($id);
        $businessTarget->name = $request->name;
        $businessTarget->business_id = $request->business_id;
        $businessTarget->product_id = $request->product_id;
        $businessTarget->category = $request->category;
        $businessTarget->weight = $request->weight;
        $businessTarget->start_date = $request->start_date;
        $businessTarget->end_date = $request->end_date;
        $businessTarget->status = $request->status;
        $businessTarget->save();

        return redirect()->route('targets.index')->with('success', 'Targets updated successfully.');
    }

    public function destroy($id)
    {
        $businessTarget = BusinessTarget::find($id);
        $businessTarget->delete();

        return redirect()->route('targets.index')->with('success', 'Targets deleted successfully.');
    }
}
