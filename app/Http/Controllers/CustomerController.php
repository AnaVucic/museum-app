<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();


        return new CustomerCollection($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|alpha|max:20',
            'lastname' => 'required|alpha|max:20',
            'email' => 'required|email|max:255|unique:customer'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $customer = Customer::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email
        ]);

        return response()->json(['New customer added.', new CustomerResource($customer)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|alpha|max:20',
            'lastname' => 'required|alpha|max:20',
            'email' => 'required|email|max:255|unique:customer'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->save();

        return response()->json(['Customer details successfully updated.', new CustomerResource($customer)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json('Customer removed.');
    }
}
