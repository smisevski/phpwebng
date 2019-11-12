<?php
use core\View;
use core\Request;
abstract class Controller
{
    public $view;
    public $redirect;

    function __construct() {
        //$this->view = new View();
    }


}