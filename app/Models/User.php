<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Searchs DB for the current login user given username and password
     *   *
     * @return \Illuminate\Support\Collection
     */
    public function check_login_user($login_fields) {

      return ((array) DB::select("select * from user_authentication where username = ? and password = ?",
        [$login_fields->username, $login_fields->password]));
    }

    /**
     * Searchs DB for the user given email
     *   *
     * @return \Illuminate\Support\Collection
     */
    public function check_email_in_DB($email) {
      return DB::select("select * from user_authentication where email = ?", [$email]);
    }
    /**
     * Searchs DB for the user given username
     *   *
     * @return \Illuminate\Support\Collection
     */
    public function check_username_in_DB($username) {
      return DB::select("select * from user_authentication where username = ?", [$username]);
    }

    /**
     * create new user
     *   *
     * @return \Illuminate\Support\Collection
     */
    public function create_new_user($signup_fields) {
        return DB::insert('insert into user_authentication (username, password, email, verification_code, verified) values (?, ?, ?, ?, ?)',
        [$signup_fields->username, $signup_fields->password, $signup_fields->email, $signup_fields->verification_code, 0]);
    }

    /**
     * Searchs DB for the current login user given verification code
     *   *
     * @return \Illuminate\Support\Collection
     */
    public function verify_user($code) {
        return ((array) DB::update("update user_authentication set verified = 1 where verification_code = ? ",
        [$code]));
    }
}
