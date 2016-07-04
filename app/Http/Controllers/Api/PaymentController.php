<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Src\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $secretToken = $request->secret_token;
        Session::forget('PAYMENT_TOKEN');
        Session::put('PAYMENT_TOKEN',$secretToken);

        $order = $this->orderRepository->where('secret_token',$secretToken)->first();

        if(!$order) {
//        if(!$order || !$order->status == 'pending') {
            return view('module.payment.failure');
        }

        $params = [
            'merchant'=>'EPG2014',
            'transaction_id'=>uniqid(),
            'amount'=>$order->amount,
            'processpage'=>url('api/v1/payment/process'),
            'sec_key'=>'8h12dwrtu83d153',
            'op_post'=> 'false',
            'md_flds'=>'transaction_id:amount:processpage',
            'user_mail'=>$order->email,
            'currency'=>'KWD',
            'remotepassword'=>'F82D2878',
            'UDF1' => $secretToken,
            'UDF2' => $order->name,
        ];

        return view('module.payment.index',compact('params','order'));
    }

    public function paymentProcess(Request $request)
    {
        $request->result = 'CAPTURED';

        $secretToken = Session::get('PAYMENT_TOKEN');
        $order = $this->orderRepository->where('secret_token',$secretToken)->first();

        if($order) {
            if($request->result == 'CAPTURED') {
                Session::put('PAYMENT_STATUS','SUCCESS');
                $order->status = 'success';
                $order->save();
                return redirect()->route('payment.success')->with('request',$request);
            }
            Session::put('PAYMENT_STATUS','FAILURE');
            $order->status = 'failed';
            $order->save();
        }

        return redirect()->route('payment.failure')->with('request',$request);
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

    public function completed(Request $request)
    {
        return view('module.payment.success',compact('request'));
    }

    public function endPayment(Request $request)
    {
        if(!Session::has('PAYMENT_STATUS')) {
            return redirect()->route('payment.failure')->with('request',$request);
        }
        return redirect()->route('payment.success')->with('request',$request);
    }

    public function getSuccess(Request $request)
    {
        return view('module.payment.success',compact('request'));
    }

    public function getFailure(Request $request)
    {
        return view('module.payment.failure',compact('request'));
    }

}

