<?php
namespace core\http {

  class Request
  {
      public $get;
      public $post;
      public $patch;
      public $put;

      function __construct() {

      }

      function input($key) {
        echo "dada"; return;
          // return function($verb) use ($key) {
          //   return $key .' '. $verb;
      }

  }

}
