<?php

namespace app\data;
use core\DB;
class DbContext extends DB
{
    public function __construct()
    {
        parent::__construct();
    }
}