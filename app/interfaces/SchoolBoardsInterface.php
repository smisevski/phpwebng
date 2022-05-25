<?php

namespace app\interfaces;

interface SchoolBoardsInterface
{
    public function CSMAverage($grades) : int;
    public function CSMBAverage($grades) : int;
}