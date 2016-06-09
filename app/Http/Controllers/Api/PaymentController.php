<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

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
        $params = [
            ['name'=>'merchant','contents'=>'EPG2014'],
            ['name'=>'transaction_id','contents'=>uniqid()],
            ['name'=>'amount','contents'=>$request->get('amount')],
            ['name'=>'processpage','contents'=>url('/api/v1/payments/process')],
            ['name'=>'sec_key','contents'=>'8h12dwrtu83d153'],
            ['name'=>'op_post','contents'=>true],
            ['name'=>'user_mail','contents'=>$request->email],
            ['name'=>'currency','contents'=>'KWD'],
            ['name'=>'remotepassword','contents'=>'F82D2878'],

//            'merchant' => 'EPG2014',
//            'transaction_id' => uniqid(),
//            'amount' => $request->get('amount'),
//            'processpage' => url('/api/v1/payments/process'),
//            'sec_key' => '8h12dwrtu83d153',
//            'op_post' => true,
//            'user_mail' => $request->email,
//            'currency ' => 'KWD',
//            'remotepassword' => 'F82D2878'
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://test.e.net.kw/Merchant/Payment/eNetCpgMainAPI.aspx', [
            'multipart' => $params
        ]);

        return $response;


        return view('module.payment.index',compact('params','amount'));
    }

    public function store(Request $request)
    {
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
