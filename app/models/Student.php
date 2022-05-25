<?php
namespace app\models;
class Student
{
    public int $id;
    public string $name;
    public array $listOfGrades;
    public int $averageResult;
    public string $finalResult;

    public function __construct($args)
    {
        $this->id = $args['id'];
        $this->name = $args['name'];
        $this->listOfGrades = $args['listOfGrades'];
        $this->averageResult = $args['averageResult'];
        $this->finalResult = $args['finalResult'];
    }
}