<?php

namespace app\controllers;

use app\models\Student;
use app\services\StudentService;
use core\Controller;
use core\Http\Request;
use core\Http\Response;

class StudentController extends Controller
{
    private $studentService;

    public function __construct(StudentService $studentService)
    {
        parent::__construct();
        $this->studentService = $studentService;
    }

    public function index()
    {
        $view = require_once('app/views/home.php');
        echo $view;
    }

    public function addStudent(Request $request, Response $response)
    {
        $req = $request->getJSON();
        try {
            $result = $this->studentService->addStudent($req);
            return $response->status(200)->toJSON($result);
        } catch (\Exception $ex) {
            return $response->status($ex->getCode())->toJSON($ex->getMessage());
        }
    }

    public function getStudentById($studentId)
    {
        $response = new Response();
        // die(json_encode(['studentId' => $studentId]));
        // try {
        //     $result = $this->studentService->getStudent($studentId);
        //     return $response->status(200)->toJSON($result);
        // } catch (\Exception $ex) {
        //     return $response->status($ex->getCode())->toJSON($ex->getMessage());
        // }
        return $response->status(200)->toJSON($studentId);
    }

    public function addGrade(Request $request, Response $response)
    {
        $req = $request->getJSON();
        // try {
        //     $result = $this->studentService->addGrade($req);
        //     return $response->status(200)->toJSON($result);
        // } catch (\Exception $ex) {
        //     return $response->status($ex->getCode())->toJSON($ex->getMessage());
        // }
        return $response->status(200)->toJSON($req);
    }
    public function getStudentGrades(Response $response, $studentId)
    {
        try {
//            $response = new Response();
            $result = $this->studentService->getStudentGrades($studentId);
//            die(json_encode(['$result' => $result]));
            return $response->status(200)->toJSON($result);
        } catch (\Exception $ex) {
            return $response->status($ex->getCode())->toJSON($ex->getMessage());
        }
    }

    public function test(Response $response)
    {
       return $response->status(200)->toJSON([
            1 => 'One',
            2 => 'Two'
       ]);
    }

}
