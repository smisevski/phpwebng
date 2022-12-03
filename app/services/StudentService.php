<?php

namespace app\services;

use app\data\DbContext;
use app\interfaces\SchoolBoardsInterface;
use PDO;
use core\DB;
use app\models\Student;
use app\models\Grade;

class StudentService implements SchoolBoardsInterface
{
    private DbContext $db;
    public function __construct(DbContext $db)
    {
        $this->db = $db;
    }

    public function addStudent($student)
    {
        $prepStmt = $this->db->pdo->prepare('insert into students(name, average_result, final_result) values (:name, :average_result, :final_result)');
        $prepStmt->bindValue(':name', $student->name, \PDO::PARAM_STR);
        $prepStmt->bindValue(':average_result', $student->averageResult, \PDO::PARAM_INT);
        $prepStmt->bindValue(':final_result', $student->finalResult, \PDO::PARAM_STR);
        $result = $prepStmt->execute();

        if (!$result) {
            throw new \Exception("Bad request.", 400);
        }

        return $this->getStudent($this->db->pdo->lastInsertId());
    }
    public function getStudent($id)
    {
        $prepStmt = $this->db->pdo->prepare('select * from students where id = :id');
        $prepStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $prepStmt->execute();

        $resultStudent = $prepStmt->fetch(PDO::FETCH_ASSOC);
        if (!$resultStudent) {
            throw new \Exception("Student not found.", 404);
        }

        $resultGrades = $this->getStudentGrades($id);
        if (count($resultGrades) <= 1) $resultGrades = [];
        $avgGrade = 6;
        return new Student([
            'id' => $resultStudent['id'],
            'name' => $resultStudent['name'],
            'listOfGrades' => $resultGrades,
            'averageResult' => $avgGrade,
            'finalResult' => $resultStudent['final_result']
        ]);
    }
    public function addGrade($grade)
    {
        $prepStmt = $this->db->pdo->prepare('insert into grades(student_id, subject, grade) values (:student_id, :subject, :grade)');
        $prepStmt->bindValue(':student_id', $grade->studentId, \PDO::PARAM_INT);
        $prepStmt->bindValue(':subject', $grade->subject, \PDO::PARAM_STR);
        $prepStmt->bindValue(':grade', $grade->grade, \PDO::PARAM_INT);
        $result = $prepStmt->execute();

        if (!$result) {
            throw new \Exception("Bad request.", 400);
        }
        return $result;
    }
    public function getStudentGrades($studentId)
    {
        $prepStmt = $this->db->pdo->prepare('select * from grades where student_id = :student_id');
        $prepStmt->bindValue(':student_id', $studentId, PDO::PARAM_INT);
        $prepStmt->execute();

        $result = $prepStmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            throw new \Exception("Not found.", 404);
        }
        return $result;
    }

    public function CSMAverage($grades): int
    {
        return 0;
    }

    public function CSMBAverage($grades): int
    {
        return 0;
    }
}
