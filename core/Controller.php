<?php

use core\View;

namespace core {
  abstract class Controller
  {

      public $view;

      public $redirect;

      function __construct() {
          $this->view = new View();
      }


  }
}
