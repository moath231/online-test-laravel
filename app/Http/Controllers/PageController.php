<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamController;

use Session;
use Mail;

class PageController extends Controller
{
    /**
  * Gets the requested page content.
  * Makes a call to a model to get the page content.
  *
  * @param  string  $page_url
  * @return \Illuminate\Support\Collection
  */
public static function get_page($page_url)
{
    $page_content = [];

    if ($page_url == 'login'){
        if(session('user_profile')){
        return view('login', ['signin'=>true, 'form_msg'=>"You are already logged in as  ".session('user_profile')[0]->username]);
        }
        elseif (request("username") && request("password")){
            $user = new UserController();
            $result = $user->get_user_by_request();
            if($result[0])
            {
                return view('homepage');
            }
            else{
                return view('login',['signin'=>true,'msg'=> $result[1]]);
            }
        }
        elseif(request("username") || request("password")){
            return view('login',['signin'=>true,'msg'=>'All fields are required']);
        }

        else{
            return view('login',['signin'=>true]);
        }
    }

    elseif($page_url == 'signup'){

        if(session('user_profile')){
            return view('login',['signup'=>true,'form_msg'=>"You are already registered as  ".session('user_profile')[0]->username]);
        }
        elseif (request("email") && request("username")){
            $user = new UserController();
            $email_existence = $user->check_email_in_DB();
            $username_existence = $user->check_username_in_DB();
        if($email_existence){
            return view('login',['signup'=>true,'msg'=>"You are already registered using this email"]);
        }
        elseif($username_existence){
            return view('login',['signup'=>true,'msg'=>"You are already registered using this username"]);
        }
        elseif(request("username") && request("password") && request("email") && request("password") == request("password_re")){
            $new_user = $user->create_new_user();
        if($new_user)
        {
            $data = array(
                'name' => request("username"),
                'email' => request("email"),
                'note' => 'Please verify your account by clicking on : ',
                'msg' => "http://localhost:8080/verify?code={$user->verification_code}",
            );

            Mail::send('mail', $data,  function ($message)
                    {
                    $message->to(request("email"), request("username"))
                            ->subject('smartmathexam Verify your profile');
                        $message->from('smartmathexam@gmail.com', 'smartmathexam');
                    });

        return view('login',['signin'=>true,'form_msg'=>"You are registered successfuly \n Please check your email for verfication."]);
        }
        else
            return view('login',['signup'=>true,'msg'=>"Sorry, something went wrong. Please try again"]);

        }
        else{
        return view('login',['signup'=>true,'msg'=>"All fields are required"]);
        }

        }

        else{
            return view('login',['signup'=>true]);
        }

    }

    elseif($page_url == 'homepage'){
        return view('homepage');
    }

    elseif($page_url == 'exam_page'){

    if(!session('user_profile')){
        return view('login',['signin'=>true, 'msg'=>'Please login first']);
    }
    else{
        $exam = new ExamController();
        $questions = $exam->load_questions();
        if($questions)
            return view('exam_page',['questions'=>$questions]);
        else
            return view('homepage');
    }
    }
    elseif($page_url == 'save_exam_data'){
        if(session('user_profile') && request("score")){
        $exam = new ExamController();
        $saved_data = $exam->save_exam_data(request("score"));

        if($saved_data)
            return true;
        else
            return "Sorry, we couldn't save your exam score";
    }
    else{
        return "Sorry, we couldn't save your exam score";
    }
        return view('user_profile');
    }
    elseif($page_url == 'user_profile'){
        if(!session('user_profile')){
        return view('login',['signin'=>true, 'msg'=>'Please login first']);
    }
    else{
        $exam = new ExamController();
        $exam_history = $exam->get_history();
        return view('user_profile', ['exam_history'=>$exam_history]);
        }
    }
    elseif($page_url == 'contact'){
        if(request("name") && request("email") && request("notes")){
        if(!empty(request("name")) && !empty(request("email")) && !empty(request("notes"))){
            $data = array(
                'name' => request("name"),
                'email' => request("email"),
                'msg' => request("notes"),
				'note' => '',
            );
            Mail::send('mail', $data,  function ($message)
                    {
                        $message->to('smartmathexam@gmail.com', 'smartmathexam')
                            ->subject('Message from Contact Page');
                        $message->from(request("email"), request("name"));
                    });

            return view('contact', ['msg'=>'Thank you, Your Message has been sent']);
        }
        else {
            return view('contact', ['msg'=>'Please fill all fields']);
        }

        }
        else{
            return view('contact');
        }
    }

    elseif($page_url == 'logout'){
        Session::forget('user_profile');
        return view('homepage');
    }

    elseif($page_url == 'verify'){
        if(request('code')){
        $user = new UserController();
        $verified = $user->get_user_by_verification_code(request('code'));

        if($verified){
            return view('login',['signin'=>true,'msg'=>'Verification complete. Please login']);
        }
    }

        return view('login',['signin'=>true,'msg'=>'Verification link is not complete.']);

    }

    else{
        return view('homepage');
    }

    }
}
