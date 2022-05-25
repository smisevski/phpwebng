<?php

namespace core {
  class View
  {
    public $viewname;
    public $tpl;
    public function with(array $data): void
    {
      
    }

    public function display(string $viewname, $data)
    {
      extract($data);
      ob_start();
      include(SYS_PATH . '/app/views/' . $viewname . '.php');
      $buffer = ob_get_contents();
      ob_clean();
      return $buffer;
    }
  }
}
