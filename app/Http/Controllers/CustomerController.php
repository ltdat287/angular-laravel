<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Models\Customer;
use Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $id = Input::get('id');

        return Customer::find($id);
    }

    public function getAll()
    {
        return Customer::all();
    }

    public function postIndex()
    {
        if ( Input::has('first_name', 'last_name', 'email') ) {
            $input = Input::all();

            if ( $input['first_name'] == '' || $input['last_name'] == '' || $input['email'] == '' ) {
                Response::make('You need to fill all of the input fields', 400);
            }

            $customer             = new Customer;
            $customer->first_name = $input['first_name'];
            $customer->last_name  = $input['last_name'];
            $customer->email      = $input['email'];
            $customer->save();

            return $customer;
        } else {
            return Response::make('you need to fill all of the input fields', 400);
        }
    }

    public function deleteIndex()
    {
        $id = Input::get('id');

        $customer = Customer::find($id);
        $customer->delete();

        return $id;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
