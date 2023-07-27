<?php

namespace App\Http\Controllers;
use PDF;
use Mail;

use Illuminate\Http\Request;
use App\Models\Userpost;

class PDFController extends Controller
{
    public function index($id){
        $userpost = Userpost::findOrFail($id);
        $mypost=$userpost->toArray();


        $data['username']=$mypost['username'];
        $data['useremail']=$mypost['useremail'];
        $data['tenant_id']=$mypost['tenant_id'];
        $data['category']=$mypost['category'];
        $data['room_type']=$mypost['room_type'];
        $data['location']=$mypost['location'];
        $data['price']=$mypost['price'];
        $data['post_date']=$mypost['post_date'];
        $data['phone']=$mypost['phone'];

        $pdf = PDF::loadView('emails.myTestMail', $data);

        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
            $message->to($data['useremail'])
                    ->subject("Your Post Details")
                    ->attachData($pdf->output(), "receipt.pdf");
        });

        return view('successpost');
    }
}
