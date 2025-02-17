<?php

namespace App\Http\Controllers;

use App\Helpers\CMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function showUploadForm()
    {
        return view('send-mail');
    }

    public function sendEmailWithAttachment(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'body' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,jpg,png,docx|max:2048', // Adjust file types and size as needed
        ]);

        // Handle file upload
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        } else {
            $attachmentPath = null;
        }

        // Prepare email details
        $to = $request->input('email');
        $subject = $request->input('subject');
        $body = $request->input('body');
        $mail_config = array(
            'from_address' => 'hello@gmail.com',
            'recipient_address' => $to,
            'recipient_name' => 'sojib',
            'subject' => $subject,
            'body' => $body
        );
        $attachments = [];

        if ($attachmentPath) {
            $attachments[] = storage_path('app/public/' . $attachmentPath);
        }

        // Send email using the helper function
        $result = CMail::send($mail_config, $attachments);

        // Check the result and return a response
        if ($result === true) {
            return response()->json('Email has sent');
            //return redirect()->back()->with('success', 'Email sent successfully!');
        } else {
            return response()->json('Email does not sent');
            //return redirect()->back()->with('error', 'Failed to send email: ' . $result);
        }
    }
}
