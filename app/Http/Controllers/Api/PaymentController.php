<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Src\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

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
        Session::forget('PAYMENT_TOKEN');
        $secretToken = $request->secret_token;
        Session::put('PAYMENT_TOKEN',$secretToken);

        $order = $this->orderRepository->where('secret_token',$secretToken)->first();

        if(!$order) {
            return view('module.payment.failure');
        }

        $params = [
//            'merchant'=>'EPG2014',
            'merchant'=>'EPG0011',
            'transaction_id'=>uniqid(),
            'amount'=>$order->amount,
            'processpage'=>url('api/v1/payment/process'),
            'sec_key'=>'E02CEB71',
            'op_post'=> 'false',
            'md_flds'=>'transaction_id:amount:processpage',
            'user_mail'=>$order->email,
            'currency'=>'KWD',
//            'remotepassword'=>'F82D2878',
            'remotepassword'=>'E02CEB71',
            'UDF1' => $secretToken,
            'UDF2' => $order->name,
        ];


        return view('module.payment.index',compact('params','order'));
    }

    public function paymentProcess(Request $request)
    {
        $secretToken = Session::get('PAYMENT_TOKEN');
        $order = $this->orderRepository->where('secret_token',$secretToken)->first();

        Session::forget('PAYMENT_TOKEN');

        if($order) {
            if($request->result == 'CAPTURED') {
                $order->status = 'success';
                $order->save();

                Mail::send('emails.contact', [], function ($m) use ($order)  {
                    $m->from($order->email, $order->name . ' Zajil Knet');
                    $m->to('zajil.knet@gmail.com','Zajil')->subject('New Order From Zajil App');
                });


                Mail::send('emails.contact', [], function ($m) use ($order) {
                    $m->from($order->email, $order->name. ' Zajil Knet');
                    $m->to('zajilkuwait@gmail.com','Zajil')->subject('New Order From Zajil App');
                });

                Mail::send('emails.contact', [], function ($m) use ($order) {
                    $m->from($order->email, $order->name. ' Zajil Knet');
                    $m->to('z4ls@live.com','Zajil')->subject('New Order From Zajil App');
                });

                if(!empty($order->email)) {
                    Mail::send('emails.contact', [], function ($m) use ($order) {
                        $m->from('ZajilKnet App', $order->name. ' Zajil Knet');
                        $m->to($order->email,$order->name)->subject('Your Order From Zajil App');
                    });
                }

                return redirect()->route('payment.success')->with('request',$request);
            }
            $order->status = 'failed';
            $order->save();



            return view('module.payment.failure',compact('request'));

        } else {
            return view('module.payment.failure',compact('request'));
        }

    }


    public function paymentCurl(Request $request)
    {
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

