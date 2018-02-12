<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

use App\Email;
use App\Mail\EmailNotificationMailable;

class EmailController extends Controller
{
    //
	public function index()
	{
		$emails = Email::all();

		return response()->json($emails);
	}

	public function sendEmail(Request $request)
	{
		$this->validate($request, [
			'date' => 'required',
	  	'from' => 'required',
	  	'to' => 'required',
	  	'cc' => 'required',
	  	'subject' => 'required',
	  	'message' => 'required',
		]);
		// dd($request);
		$email = Email::create([
			'date' => $request->date,
	  	'from' => $request->from,
	  	'to' => $request->to,
	  	'cc' => $request->cc,
	  	'subject' => $request->subject,
	  	'message' => $request->message,
		]);

		// Send email...

    Mail::to($email->to)->cc($email->cc)->send(new EmailNotificationMailable($email));

    return response()->json($email);
	}

	public function destroy($id)
	{
		$email = Email::destroy($id);
		return $email;
	}
}
