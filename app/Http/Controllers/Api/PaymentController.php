<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Src\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * @var Order
     */
    private $orderRepository;

    /**
     * PaymentController constructor.
     * @param Order $orderRepository
     */
    public function __construct(Order $orderRepository)
    {
//        $this->middleware(['csrf'=>['except'=>'processResult']]);
        $this->orderRepository = $orderRepository;
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
        $secretToken = $request->secret_token;
        $amount = $request->amount;
        $email = $request->email;
        $params = [
            'merchant'=>'EPG2014',
//            'transaction_id'=>$secretToken,
            'transaction_id'=>uniqid(),
            'amount'=>$amount,
            'processpage'=>url('api/v1/payment/process'),
            'sec_key'=>'8h12dwrtu83d153',
            'op_post'=> 'false',
            'md_flds'=>'transaction_id:amount:processpage',
            'user_mail'=>$email,
            'currency'=>'KWD',
            'remotepassword'=>'F82D2878',
        ];

        return view('module.payment.index',compact('params','amount'));
    }

    public function paymentProcess(Request $request)
    {
        if($request->result == 'CAPTURED') {

//            $secretToken = $request->transaction_id;
//
//
//            $order = $this->orderRepository->where('secret_token',$secretToken)->first();
//
//            if($order) {
//                $order->status('success');
//                $order->save();
//                return view('module.payment.success',compact('request'));
//            }
            return view('module.payment.success',compact('request'));
        }
        return view('module.payment.failure',compact('request'));
    }


    public function paymentCurl(Request $request)
    {
        $weddingDate = $request->wedding_date;
        $amount = $request->amount;
        $email = $request->email;
        $params = [

            ['name'=>'merchant','contents'=>'EPG2014'],
            ['name'=>'transaction_id','contents'=>uniqid()],
            ['name'=>'amount','contents'=>$amount],
            ['name'=>'processpage','contents'=>url('api/v1/payment/process')],
            ['name'=>'sec_key','contents'=>'8h12dwrtu83d153'],
            ['name'=>'op_post','contents'=> 'false'],
            ['name'=>'md_flds','contents'=>'transaction_id:amount:processpage'],
            ['name'=>'user_mail','contents'=>$email],
            ['name'=>'currency','contents'=>'KWD'],
            ['name'=>'remotepassword','contents'=>'F82D2878'],


        ];
        $client = new \GuzzleHttp\Client(['base_uri'=>'http://test.e.net.kw/merchant/payment/']);
//        $response = $client->request('POST', 'https://dealer.e.net.kw/merchant/payment', [
        $response = $client->request('POST', 'eNetCpgMainAPI.aspx', [
            'multipart' => $params
        ]);

        return $response;


    }

}

