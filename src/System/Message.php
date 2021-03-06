<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 7/6/2015
 * Time: 2:26 AM
 */

namespace System;


class Message {

    public  $messages;

    public $errors;

    public function __construct()
    {

        $this->messages = isset($_SESSION['MESSAGES'])? $_SESSION['MESSAGES'] : null;
        $this->errors = isset($_SESSION['ERRORS'])? $_SESSION['ERRORS'] : null;


        return $this;
    }

    public function has($key){
        if (isset($this->messages[$key]))
            return true;

        return false;
    }

    public function hasErrors(){
        if (count($this->errors) > 0)
            return true;

        return false;
    }

    public function all()
    {
        $msgs[] = $this->messages;
        $msgs[] = $this->errors;
        return $msgs;
    }

    public function get($key)
    {
        if (isset($this->messages[$key]))
            return $this->messages[$key];

        return null;
    }

    public function set($key,$value)
    {
        $this->messages[$key] = $value;

        $_SESSION['MESSAGES'] = $this->messages;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function clear()
    {
        unset($_SESSION['MESSAGES']);
        unset($_SESSION['ERRORS']);

        return true;
    }


}