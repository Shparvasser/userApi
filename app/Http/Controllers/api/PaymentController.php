<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @param PaymentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $recipientAccount = User::where('id', $request->recipient_account_id)->first();

        if (!$recipientAccount)
            return response(['error' => 'Account not found'],Response::HTTP_NOT_FOUND);

        if ($recipientAccount->id === auth()->user()->id)
            return response(['error' => 'You cannot transfer money to yourself'], Response::HTTP_BAD_REQUEST);

        $payment = Payment::create([
            'uuid' => Str::uuid()->toString(),
            'sender_account_id' => auth()->user()->id,
            'recipient_account_id' => $request->recipient_account_id,
            'amount' => $request->amount,
            'status' => Payment::PAYMENT_STATUS_OK
        ]);

        $recipientAccount->update([
            'balance' => $recipientAccount->balance + $payment->amount
        ]);

        return response([
            'payment_id' => $payment->id,
            'status' => 'OK',
            'amount' => $payment->amount,
            'sender_account_id' => $payment->sender_account_id,
            'recipient_account_id' => $payment->recipient_account_id,
        ], Response::HTTP_OK);
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
