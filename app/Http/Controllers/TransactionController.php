<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Transaction;
use Input;
use Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $id = Input::get('id');

        return Customer::find($id)->transactions;
    }

    public function postIndex()
    {
        if ( Input::has('name', 'amount') ) {
            $input = Input::all();

            if ($input['name'] == '' || $input['amount'] == '') {
                return Response::make('You need to fill all of the input fields', 400);
            }

            $transaction = new Transaction;
            $transaction->name = $input['name'];
            $transaction->amount = $input['amount'];

            $id = $input['customer_id'];
            Customer::find($id)->transactions->save($transaction);

            return $transaction;
        } else {
            return Response::make('You need to fill all of the input fields.');
        }
    }

    public function deleteIndex()
    {
        $id = Input::get('id');
        $transaction = Transaction::find($id);
        $transaction->delete();

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
