<?php
namespace core;

class View
{
    public function displayView($view_filepath) {
          
    }
    
    public function setViewParams($view_params) {
        foreach ($view_params as $param_key => $param_value) {
            ddie($param_value);
        }
    }
    
}