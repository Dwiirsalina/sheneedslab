<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use App\Models\RequestForm;

class StatusController extends Controller
{
    public function FunctionName($value='')
    {
        // instatiate mailer class
        $mail = new PHPMailer();

        // mail settings
        $mail->IsSMTP();
        $mail->Host = 'mail.yourdomain.com';
        $mail->Port = (25 or 587, or whatever your smtp port is);
        $mail->SMTPAuth   = true; 
        $mail->SetFrom('mailer@yourdomain.com', 'Display Name';
        $mail->Username   = "sendingemailaddresslogin@yourdomain";
        $mail->Password   = "passwordforsendingemailaddress";
        $mail->IsHTML(true);
        $mail->Subject = 'Subject';
        $mail->Body = 'Body';
        $mail->AddAddress('to_address_here');
        $mail->AddAttachment('path_to_uploaded_file', 'filename.pdf', "base64", "application/pdf");  // Path, Name, Encoding, Mime type
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message with attachment sent!";
        }
    }
}
