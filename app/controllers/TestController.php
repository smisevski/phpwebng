<?php

use core\Controller;
use core\http\Request;
use core\http\Response;
use core\DB;

class TestController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function Index()
  {
    echo "INDEX PAGE. ROUTE PATH ROUTE.";
  }

  public function PrintCommand()
  {
    $db = new DB();
    $sql = 'SELECT * FROM articles';
    $res = $db->connect()->query($sql)->get();
    if ($res) {
      ddie($res);
    }
    // ddie($res);
  }

  public function PrintParameterCommand()
  {
    $time = 'dadada';
    $data = ['da', 'ne'];
    ddie(SYS_PATH);

    require_once('C:\\xampp\\htdocs\\PHPWebNg-basic-Framework\\app\\views\\home.php');
  }

  public function PostCommand()
  {
    //$request::displayReq();
    $db = new DB();
    $sql = 'SELECT * FROM articles';
    $res = $db->connect()->query($sql)->get();
    ddie($res);
  }

  public function TestView()
  {
    $data_wr = [
      'data' => [
        'da', 'ne'
      ],
      'time' => 'the time is: '
    ];

    $this->view->display('home', $data_wr);
    // extract($data_wr);
  
    // $this->view->display('home', $data);
  }
}
