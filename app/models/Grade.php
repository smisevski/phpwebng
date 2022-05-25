<?php

namespace app\models;

class Grade
{
    public int $id;
    public int $studentId;
    public string $subject;
    public int $grade;

    public function __construct($args)
    {
        $this->id = $args['id'];
        $this->studentId = $args['student_id'];
        $this->subject = $args['subject'];
        $this->grade = $args['grade'];
    }
}