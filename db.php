<?php

require "rb-mysql.php";
R::setup('mysql:host=localhost;dbname=project','root',"");
session_start();
class ord
{

    public $var1 = 0;
    function construct() {
        $var1 = rand(1,25);
    }

    function setVar($value){
        $this->var1 = $value;
    }
}
