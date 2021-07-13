<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactUsFormController extends Controller {

    // Create Contact Form
    public function createForm(Request $request) {
      return view('contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        //  Store data in database
        //Contact::create($request->all());

        //  Send mail to admin
        \Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'service' => $request->get('service'),
            'type_product' => $request->get('type-product'),
            'from_value' => $request->get('from-value'),
            'to_value' => $request->get('to-value'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('lama.solutions.100@gmail.com', 'Admin')->subject("Message from Lama website");
        });

        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
        
    }

}
/*


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactUsFormController extends Controller {
    // Create Contact Form
    public function createForm(Request $request) {
      return view('contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        //  Store data in database
        Contact::create($request->all());

        //  Send mail to admin
        \Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'service' => $request->get('service'),
            'type_product' => $request->get('type-product'),
            'from_value' => $request->get('from-value'),
            'to_value' => $request->get('to-value'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('lama.solutions.100@gmail.com', 'Admin')->subject("Message from Lama website");
        });

        return redirect()->back()->with('success',  'We have received your message and would like to thank you for writing to us.');
    }

}

*/