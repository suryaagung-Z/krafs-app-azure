<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('apps.profile', ["data" => User::find(Auth::user()->_id)]);
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
        //
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

        $req = $request->all();

        $update = Customer::find(Auth::user()->customer->_id);
        $update->phone = $req['phone'] ?? '';
        $update->fullName = $req['fullName'] ?? '';
        $update->age = $req['age'] ?? '';
        $update->birthday = $req['birthday'] ?? '';
        $update->country = $req['country'] ?? '';
        $update->state = $req['state'] ?? '';
        $update->city = $req['city'] ?? '';
        $update->districts = $req['districts'] ?? '';
        $update->subDistricts = $req['subDistricts'] ?? '';
        $update->zipCode = $req['zipCode'] ?? '';
        $update->detailAddress = $req['detailAddress'] ?? '';

        if ($update->save()) {
            return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
        } else {
            return redirect()->route('profile.index')->with('warning', 'Failed to update profile');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
