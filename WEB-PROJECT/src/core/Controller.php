<?php

class Controller{

    public static function view($view){
        if(file_exists('../src/view/'.$view.'php')){
            require_once '../src/view/'.$view.'php';
        }
    }

    public static function model($model){
        if(file_exists('../src/model/'.$model.'php')){
            require_once '../src/model/'.$model.'php';
        }
    }
}