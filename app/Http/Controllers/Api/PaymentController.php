<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $weddingDate = $request->wedding_date;
        $amount = $request->amount;
        $params = (object) [
            'merchant' => 'EPG2014',
            'transaction_id' => uniqid(),
            'amount' => $request->get('amount'),
            'processPage' => url('/api/v1/payments/process'),
            'sec_key' => 'F82D2878',
            'op_post' => true,
            'user_mail' => $request->email,
            'currency ' => 'KWD',
        ];

        $client = new \GuzzleHttp\Client();
//        dd($params);
//        dd($client->request('POST','http://test.e.net.kw/Merchant/Payment/eNetCpgMainAPI.aspx'));
//        <form name=”myform” method=”POST” action=””>
        $response = $client->request('POST', 'http://test.e.net.kw/Merchant/Payment/eNetCpgMainAPI.aspx', [
//        $response = $client->request('POST', 'http://dealer.e.net.kw/merchant/payment', [
            'form_params' => $params
        ]);

        return $response;


        return view('module.payment.index',compact('params','amount'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $params = [
            'transaction_id' => uniqid(),
            'amount' => $request->get('amount'),
            'processPage' => url('/payments/process'),
            'sec_key' => '',
            'op_post' => true,
            'user_mail' => $request->email,
            'currency ' => 'KWD',
            ''
        ];
        dd($request->all());
    }

    public function processResult(Request $request)
    {
        dd($request->all());
    }

}
