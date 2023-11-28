<?php

namespace App\Http\Controllers;

use App\Mail\ReplyMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendReply(Request $request)
    {
        $email = $request->input('email');
        $message = $request->input('message');

        try {
            Mail::to($email)->send(new ReplyMail($message));
            $contact = ContactUs::where('id',$request->input('id'));
            $contact->delete();
            return redirect('/admin/contact-us')->with('success','Uspesno ste odgovorili na postavljeno pitanje! ');
        } catch (\Exception $e) {
            return "Email nije mogao biti poslan. Greška: " . $e->getMessage();
        }
    }
}
