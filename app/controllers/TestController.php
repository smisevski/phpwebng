<?php
//use core\Request;
class TestController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index() {
        echo "INDEX PAGE. ROUTE PATH ROUTE.";
    }

    public function printCommand() {
        echo "GOTTEN";
    }
    
    public function printParameterCommand($id) {
        echo "GOTTEN WITH PARAMS: " . $id ;
    }

    public function postCommand() {
        //$request::displayReq();
       
        //print_r(strtoupper($_POST['field']));
        print_r('\nHELLO POST!!');
    }
}

