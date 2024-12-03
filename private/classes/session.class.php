<?php
class Session {
    private $member_id;
    public $username;
    private $last_login;
    public $message;

    public function __construct() {
        session_start();
        $this->check_stored_login();
        $this->check_message();
    }

    public function login($member) {
        if($member) {
            // Prevent session fixation attacks
            session_regenerate_id();
            $this->member_id = $_SESSION['member_id'] = $member->id;
            $this->username = $_SESSION['username'] = $member->username;
            $this->last_login = $_SESSION['last_login'] = time();
        }
        return true;
    }

    public function is_logged_in() {
        return isset($this->member_id) && $this->last_login_is_recent();
    }

    public function logout() {
        unset($_SESSION['member_id']);
        unset($_SESSION['username']);
        unset($_SESSION['last_login']);
        unset($this->member_id);
        unset($this->username);
        unset($this->last_login);
        return true;
    }

    private function check_stored_login() {
        if(isset($_SESSION['member_id'])) {
            $this->member_id = $_SESSION['member_id'];
            $this->username = $_SESSION['username'];
            $this->last_login = $_SESSION['last_login'];
        }
    }

    private function last_login_is_recent() {
        if(!isset($this->last_login)) {
            return false;
        }
        return ($this->last_login + (60 * 60 * 24)) >= time();
    }

    public function message($msg="") {
        if(!empty($msg)) {
            // Set message
            $_SESSION['message'] = $msg;
            return true;
        } else {
            // Get message
            return $this->message;
        }
    }

    private function check_message() {
        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = '';
        }
    }
}
?>
