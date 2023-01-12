<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Patient\StorePaymentMethodRequest;
use App\Http\Requests\API\Patient\UpdatePaymentMethodRequest;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('payment_method_user')->only([ 'show', 'update', 'destroy']);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::select('id','cc')
        ->where('user_id', auth()->id())
        ->get();
        $changedArray = [];
        foreach ($paymentMethods as $paymentMethod) {
            $paymentMethod->cc = substr($paymentMethod->cc, -4);
            $changedArray[] = $paymentMethod;
        }
        return ok('', $changedArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentMethodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentMethodRequest $request)
    {
        PaymentMethod::create($request->validated() + ['user_id' => auth()->id()]);
        return ok('Creada', []);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $PaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        $paymentMethod->cc = substr($paymentMethod->cc, -4); 
        return ok('', $paymentMethod->cc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentMethodRequest  $request
     * @param  \App\Models\PaymentMethod  $PaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->update($request->validated());
        return ok('Actualizado', []);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $PaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return ok('Borrado', []);
    }
}
