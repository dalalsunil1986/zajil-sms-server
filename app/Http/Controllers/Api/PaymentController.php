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
        $secretToken = $request->secret_token;

        $order = $this->orderRepository->where('secret_token',$secretToken)->first();
        $order->status = 'payment';
        $order->save();

//        $transactionID = uniqid();

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


        $services = [];

        if($order->message_id) {
            $services[] = ['name' => 'Message','amount'=>$order->message->price,'date'=>$order->message_date->format('d-m-Y')];
        }
        if($order->buffet_package_id) {
            $services[] = ['name' => 'Buffet ('.$order->buffetPackage->buffet->name.' - '.$order->buffetPackage->description.')','amount'=>$order->buffetPackage->price,'date'=>$order->buffet_date->format('d-m-Y')];
        }
        if($order->hall_id) {
            $services[] = ['name' => 'Hall ('.$order->hall->name.')','amount'=>$order->hall->price,'date'=>$order->hall_date->format('d-m-Y')];
        }
        if($order->photographer_id) {
            $services[] = ['name' => 'Photographer ('.$order->photographer->name.')','amount'=>$order->photographer->price,'date'=>$order->photographer_date->format('d-m-Y')];
        }
        if($order->light_service_id) {
            $services[] = ['name' => 'Lighting ('.$order->lightService->name.')','amount'=>$order->lightService->price,'date'=>$order->light_service_date->format('d-m-Y')];
        }
        if($order->guest_service_id) {
            $services[] = ['name' => 'Guest Service ('.$order->guestService->name.')','amount'=>$order->guestService->price,'date'=>$order->guest_service_date->format('d-m-Y')];
        }

        $emailArray = ['date'=>date('d-m-Y'),'invoiceNo'=>$order->id,'name'=>$order->name,'transaction_id'=>$params['transaction_id'],'total'=>$order->amount,'services'=>$services];

//        Mail::send('emails.transaction_success', $emailArray, function ($m) use ($order)  {
//            $m->from($order->email, 'ZajilKnet Order');
//            $m->to('zajil.knet@gmail.com','Zajil')->subject('New Order From ZajilKnet');
//        });
//
        Mail::send('emails.transaction_success', $emailArray, function ($m) use ($order) {
            $m->from('payment@zajil.app','ZajilKnet Order');
            $m->to('z4ls@live.com','Zajil')->subject('New Order From ZajilKnet');
        });
//
//        if(!empty($order->email)) {
//            Mail::send('emails.contact', $emailArray, function ($m) use ($order) {
//                $m->from('ZajilKnet App', 'ZajilKnet Order');
//                $m->to($order->email,$order->name)->subject('Your Order From Zajil App');
//            });
//        }

        return view('module.payment.index',compact('params','order'));
    }

    public function paymentProcess(Request $request)
    {
        $secretToken = $request->UDF1;
        $transactionID = $request->transaction_id;
        $order = $this->orderRepository->where('secret_token',$secretToken)->first();
        if($request->result == 'CAPTURED') {
            if($order) {
                $order->transaction_id = $transactionID;
                $order->status = 'success';
                $order->save();
            }
            return 'Redirect=http://zajil.izal.me/api/v1/payment/success';
        }  else {
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

