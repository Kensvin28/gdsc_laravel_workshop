<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = \App\Models\Customer::all();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+(\s[a-zA-Z]+)*$/'],
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required', 'regex:/^(\+?6)?01[0-46-9]-*\d{7,8}$/'],
        ]);
        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
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
        $customer = Customer::find($id);

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);
        
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+(\s[a-zA-Z]+)*$/'],
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required', 'regex:/^(\+?6)?01[0-46-9]-*\d{7,8}$/'],
        ]);
            
        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('customers.index');
    }
}
