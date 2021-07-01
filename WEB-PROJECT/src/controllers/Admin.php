<?php
class Admin extends Controller{

    public function admin_index(){
        parent::view('admin_index');
    }

    public function login_admin(){
        parent::view('login_amdin');
    }
}