<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public string $username;
    public string $password;
    public string $email;
    public array $user_profile;

/**
  * Makes a call to a model to check user credentials .
  *
  * @return \Illuminate\Support\Collection
  */


public function get_user_by_request()
{
    $current_user = new User();

    $this->username = request("username")? request("username") : '';
    $this->password = request("password")? request("password") : '';
    $this->user_profile = $current_user->check_login_user($this);


    if($this->user_profile)
    {
        if($this->user_profile[0]->verified)
        {
            session()->put('user_profile', $this->user_profile);
            return [true, $this];
        }
    else
        return [false, 'Please verify your account first'];
    }
    else {
        return [false, 'Incorrect username or password'];
    }
}

/**
   * Makes a call to a model to create new user
   *   *
   * @return \Illuminate\Support\Collection
   */
public function create_new_user() {
    $current_user = new User();
    $rand_numer = rand(1000000, 10000000);
    $this->username = request("username");
    $this->password = request("password");
    $this->email = request("email");
    $this->verification_code = request("username")."{$rand_numer}";

    return $current_user->create_new_user($this);
}
/**
  * Makes a call to a model to check user credentials .
  *
  * @return \Illuminate\Support\Collection
  */
public function get_user_by_verification_code($code)
{
    $current_user = new User();

    if($code)
    $verified = $current_user->verify_user($code);

    return $verified;
}


/**
  * Makes a call to a model to check if user email registered before .
  *
  * @return \Illuminate\Support\Collection
  */
public function check_email_in_DB()
{
    $current_user = new User();
    return $current_user->check_email_in_DB(request("email"));
}

public function check_username_in_DB()
{
    $current_user = new User();

    return $current_user->check_username_in_DB(request("username"));
}



}
