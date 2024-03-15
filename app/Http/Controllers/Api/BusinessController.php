<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(Request $request)
    {
        // Get business and include user name
        $businesses = Business::when($request->name, function ($query) use ($request) {
            return $query->where('name', $request->name);
        })
            ->where('user_id', auth()->id())
            ->with('user:id,name')
            ->get();

        // Format the response
        $formattedBusinesses = [];
        foreach ($businesses as $business) {
            $formattedBusinesses[] = [
                'id' => $business->id,
                'user_id' => $business->user_id,
                'owner' => $business->user->name,
                'name' => $business->name,
                'logo' => $business->logo,
                'sector' => $business->sector,
                'status' => $business->status,
                'created_at' => $business->created_at,
                'updated_at' => $business->updated_at,
            ];
        }

        return response()->json([
            'message' => 'Success',
            'data' => $formattedBusinesses
        ], 200);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'logo' => 'required',
            'sector' => 'required',
            'status' => 'required',
        ]);

        $business = new Business();
        $business->name = $request->name;
        $business->user_id = $request->user_id;
        $business->logo = $request->logo;
        $business->sector = $request->sector;
        $business->status = $request->status;
        $business->save();

        return response()->json([
            'message' => 'Business created successfully',
            'data' => $business
        ], 200);
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'logo' => 'required',
            'sector' => 'required',
            'status' => 'required',
        ]);

        $business = Business::find($id);
        $business->name = $request->name;
        $business->user_id = $request->user_id;
        $business->logo = $request->logo;
        $business->sector = $request->sector;
        $business->status = $request->status;
        $business->save();

        return response()->json([
            'message' => 'Business updated successfully',
            'data' => $business
        ], 200);
    }

    public function updateStatus(Request $request, string $id)
    {

        $request->validate([
            'status' => 'required',
        ]);

        $business = Business::find($id);
        $business->status = $request->status;
        $business->save();
        return response()->json([
            'message' => 'Business status updated successfully',
            'data' => $business
        ], 200);
    }

    public function destroy(string $id)
    {
        $business = Business::find($id);
        $business->delete();

        return response()->json([
            'message' => 'Business deleted successfully',
            'data' => $business
        ], 200);
    }
}
