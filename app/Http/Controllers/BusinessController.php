<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{

    public function index(Request $request)
    {
        $businesses = DB::table('businesses')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->join('users', 'businesses.user_id', '=', 'users.id')
            ->select('businesses.id', 'users.name as owner', 'users.email as owner_email', 'businesses.name as business_name', 'businesses.logo', 'businesses.sector', 'businesses.status')
            ->orderBy('businesses.id', 'desc')
            ->paginate(10);
        return view('pages.business.index', compact('businesses'));
    }

    public function create()
    {
        $users = User::all();
        return view('pages.business.create', compact('users'));
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

        return redirect()->route('businesses.index')->with('success', 'business created successfully.');
    }

    public function show($id)
    {
        $business = Business::find($id);
        return view('pages.business.show', compact('businesses'));
    }

    public function edit($id)
    {
        $users = User::all();
        $businesses = Business::find($id);
        return view('pages.business.edit', compact('users'))->with('businesses', $businesses);
    }

    public function update(Request $request, $id)
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

        return redirect()->route('businesses.index')->with('success', 'business updated successfully.');
    }

    public function destroy($id)
    {
        $business = Business::find($id);
        $business->delete();

        return redirect()->route('businesses.index')->with('success', 'business deleted successfully.');
    }
}
