<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BusinessTarget;
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
            ->orderBy('business_targets.id', 'desc')->get();
        return response()->json([
            'message' => 'Success',
            'data' => $business_targets
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'business_id' => 'required',
            'product_id' => 'required',
            'category' => 'required|in:Quantitative,Qualitative',
            'weight' => 'required|integer',
            'start_date' => 'required',
            'end_date' => 'required',
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

        return response()->json([
            'message' => 'Targets updated successfully',
            'data' => $businessTarget,
        ]);
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
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

        return response()->json([
            'message' => 'Targets updated successfully',
            'data' => $businessTarget,
        ]);
    }

    public function destroy(string $id)
    {
        $businessTarget = BusinessTarget::find($id);
        $businessTarget->delete();

        return response()->json([
            'message' => 'Targets deleted successfully',
            'targets' => $businessTarget,
        ]);
    }
}
