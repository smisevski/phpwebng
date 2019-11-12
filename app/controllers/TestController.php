<?php
use core\Request;
class TestController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function printCommand() {
        echo "GOTTEN";
    }

    public function postCommand() {
        //$request::displayReq();
       
        print_r(strtoupper($_POST['field']));
    }
}

