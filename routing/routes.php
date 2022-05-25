<?php
/**
 * This is where the route endpoints are defined, with their controller handlers
 */
use core\Router;
use app\controllers\StudentController;


Router::post('addStudent', StudentController::class, 'addStudent');
Router::get('getStudentById/:studentId', StudentController::class, 'getStudentById');

Router::post('addGrade', StudentController::class, 'addGrade');
Router::get('getStudentGrades/:studentId', StudentController::class, 'getStudentGrades');





