<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct()
    {
//        $this->middleware(['csrf'=>['except'=>'processResult']]);
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
        $params = [
//            ['name'=>'merchant','contents'=>'EPG2014'],
//            ['name'=>'transaction_id','contents'=>uniqid()],
//            ['name'=>'amount','contents'=>$request->get('amount')],
//            ['name'=>'processpage','contents'=>url('api/v1/payment/success')],
//            ['name'=>'sec_key','contents'=>'8h12dwrtu83d153'],
//            ['name'=>'op_post','contents'=> 'true'],
//            ['name'=>'md_flds','contents'=>'transaction_id:amount:processpage'],
//            ['name'=>'user_mail','contents'=>$request->email],
//            ['name'=>'currency','contents'=>'KWD'],
//            ['name'=>'remotepassword','contents'=>'F82D2878'],

            'merchant' => 'EPG2014',
            'transaction_id' => uniqid(),
            'amount' => $request->get('amount'),
            'processpage' => url('api/v1/payments/success'),
            'sec_key' => '8h12dwrtu83d153',
            'op_post' => 'true',
            'md_flds' => 'transaction_id:amount:processpage',
            'user_mail' => $request->email,
            'currency ' => 'KWD',
            'remotepassword' => 'F82D2878'
        ];

//        $client = new \GuzzleHttp\Client();
//        $response = $client->request('POST', 'https://dealer.e.net.kw/merchant/payment', [
//        $response = $client->request('POST', 'http://test.e.net.kw/Merchant/Payment/eNetCpgMainAPI.aspx', [
//            'multipart' => $params
//        ]);

//        return $response;


        return view('module.payment.index',compact('params','amount'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function paymentSuccess(Request $request)
    {
        dd($request);
        return view('module.payment.success');
    }

    public function paymentFailure(Request $request)
    {
        return view('module.payment.failure');
    }

}
