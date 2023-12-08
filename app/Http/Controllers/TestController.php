<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Property;
use App\Models\Subscriber;
use App\Services\Sendgrid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    //
    public function sendWelcomeEmail()
    {
//        $userEmail = 'user@example.com'; // Replace with the recipient's email address
//        Mail::to($userEmail)->send(new WelcomeEmail());
//        return 'Welcome email sent successfully.';
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("toronto@tutunjirealty.com", "tutunjirealty");
        $email->setSubject("Sending with Twilio SendGrid is Fun");
        $email->addTo("test33221101@gmail.com", "Test User");
        $email->addTo("radha.tinnypixel@gmail.com", "Radha");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>Hello There</strong>"
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        //$sendgrid = getenv('SENDGRID_API_KEY');
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";

            echo "<pre>";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }

//    public function testBulkEmails(Request $request)
//    {
//        $users = Subscriber::all();
//        //return $users[0]->email;exit();
//        $subject = 'Testing bulk Emails';
//        $sendgridPersonalization = [];
//        foreach ($users as $user) {
//            array_push(
//                $sendgridPersonalization,
//                [
//                    'to' => [[ 'email' => $user[0]->email ]],
//                    'substitutions' => [
//                        '%first_name%' => 'Tesing'
//                    ]
//                ]
//            );
//        }
//        // Send bulk emails through sendgrid API
//        $resultBulkEmail = Sendgrid::sendBulkEmail(
//            $subject,
//            $sendgridPersonalization,
//            view('emails.test')->render()
//        );
//        if(!$resultBulkEmail['status']) {
//            return redirect()->back()->withErrors('Email sending failed!');
//        }
//        return redirect()->back()->with('success', 'Email sending ');
//    }
    public function multipleMail(){
//        $users = Subscriber::all();
        //$users = Subscriber::query()->select('email')->get()->toArray();
        //$getAttachmentFiles = Property::query()->where('id',$inquiryId)->get('attachments');

        //$files = public_path('admin-panel/assets/attachments/signup/'.$getAttachmentFiles[0]->attachments);
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("toronto@tutunjirealty.com", "tutunjirealty");
       //$tos = [
//            "test+test1@example.com" => "Example User1",
//            "test+test2@example.com" => "Example User2",
//            "test+test3@example.com" => "Example User3"
        //$users[0]->email => 'Subscribers'

        //];
        $tos = array();
        $userResults = Subscriber::query()->select( "email")->get();
        foreach($userResults as $user){
            $tos[$user['email']]= 'Subscribers';
        }
        $email->addTos($tos);

        $email->setSubject("Sending Mail Using Sendgrid Api");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>Test Mail To All Subscribers using Sendgrid API</strong>"
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            echo '<pre>';
            print_r($response->headers());
            //echo '</pre'
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '.  $e->getMessage(). "\n";
        }
    }

}
