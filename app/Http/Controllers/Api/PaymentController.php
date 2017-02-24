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

        if(!$order) {
            return view('module.payment.failure');
        }

        $order->status = 'payment';
        $order->save();

        $params = [
            'merchant'=>'EPG2014', // test
//            'merchant'=>'EPG0011', // live
            'transaction_id'=>uniqid(),
            'amount'=>$order->amount,
            'processpage'=>url('api/v1/payment/process'),
            'sec_key'=>'E02CEB71',
            'op_post'=> 'false',
            'md_flds'=>'transaction_id:amount:processpage',
            'user_mail'=>$order->email,
            'currency'=>'KWD',
            'remotepassword'=>'F82D2878', // test
//            'remotepassword'=>'E02CEB71', // live
            'UDF1' => $secretToken,
            'UDF2' => $order->name,
        ];

        return view('module.payment.index',compact('params','order'));
    }

    public function paymentProcess(Request $request)
    {
        $secretToken = $request->get('UDF1');
        $transactionID = $request->get('transaction_id');
        $order = $this->orderRepository->where('secret_token',$secretToken)->first();
        if($request->result == 'CAPTURED') {
            if($order) {
                $order->transaction_id = $transactionID;
                $order->status = 'success';
                $order->save();
            }
            return 'Redirect=http://zajil.ideasowners.net/api/v1/payment/success';
        }  else {
            return 'Redirect=http://zajil.ideasowners.net/api/v1/payment/failure';
        }

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

    public function postSuccess(Request $request)
    {
        $secretToken = $request->json('secret_token');
        $order = $this->orderRepository->where('secret_token',$secretToken)->first();
        $services = [];

        if($order) {

            if($order->message_id) {
                if($order->message) {
                    $services[] = ['name' => 'Message','content'=>$order->message_text,'amount'=>$order->message->price,'date'=>$order->message_date->format('d-m-Y'),'time'=>$order->message_time];
                }
            }

            if($order->buffet_package_id) {
                if($order->buffetPackage && $order->buffetPackage->buffet) {
                    $services[] = ['name' => 'Buffet ('.$order->buffetPackage->buffet->name.' - '.$order->buffetPackage->description.')','amount'=>$order->buffetPackage->price,'date'=>$order->buffet_date->format('d-m-Y')];
                }
            }
            if($order->hall_id) {
                if($order->hall) {
                    $services[] = ['name' => 'Hall ('.$order->hall->name.')','amount'=>$order->hall->price,'date'=>$order->hall_date->format('d-m-Y')];
                }
            }
            if($order->photographer_id) {
                if($order->photographer) {
                    $services[] = ['name' => 'Photographer ('.$order->photographer->name.')','amount'=>$order->photographer->price,'date'=>$order->photographer_date->format('d-m-Y')];
                }
            }
            if($order->light_service_id) {
                if($order->lightService) {
                    $services[] = ['name' => 'Lighting ('.$order->lightService->name.')','amount'=>$order->lightService->price,'date'=>$order->light_service_date->format('d-m-Y')];
                }
            }
            if($order->guest_service_id) {
                if($order->guestService) {
                    $services[] = ['name' => 'Guest Service ('.$order->guestService->name.')','amount'=>$order->guestService->price,'date'=>$order->guest_service_date->format('d-m-Y')];
                }
            }

            $emailArray = ['date' => date('d-m-Y'),'invoiceNo' => $order->id,'name' => $order->name,'phone' => $order->phone,'transaction_id'=>$order->transaction_id,'total'=>$order->amount,'services'=>$services];


            Mail::send('emails.transaction_success', $emailArray, function ($m) use ($order) {
                $m->from('zajil.knet1@gmail.com','ZajilKnet Order');
                $m->to('z4ls@live.com','Zajil')->subject('New Order From ZajilKnet');
            });
//
//            Mail::send('emails.transaction_success', $emailArray, function ($m) use ($order)  {
//                $m->from('zajil.knet1@gmail.com', 'ZajilKnet Order');
//                $m->to('zajil.knet@gmail.com','Zajil')->subject('New Order From ZajilKnet');
//            });
//
//
//            if(!empty($order->email)) {
//                Mail::send('emails.transaction_success', $emailArray, function ($m) use ($order) {
//                    $m->from('zajil.knet1@gmail.com', 'ZajilKnet Order');
//                    $m->to($order->email,$order->name)->subject('Your Order From Zajil App');
//                });
//            }

            return response()->json(['success'=>true]);
        } else {
            return response()->json(['success'=>false]);
        }

    }


    public function getFailure(Request $request)
    {
        return view('module.payment.failure',compact('request'));
    }

}

