<?php
include '../config/database.php';

class StudentController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getStudentById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM students WHERE user_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getCourseOutline($courseId) {
        $stmt = $this->pdo->prepare("SELECT * FROM course_outlines WHERE course_id = ?");
        $stmt->execute([$courseId]);
        return $stmt->fetch();
    }

    public function getCourseCoverage($studentId, $courseId) {
        $stmt = $this->pdo->prepare("SELECT * FROM course_coverage WHERE student_id = ? AND course_id = ?");
        $stmt->execute([$studentId, $courseId]);
        return $stmt->fetch();
    }

    public function getSpotlightStudents($period) {
        $stmt = $this->pdo->prepare("SELECT * FROM student_spotlights WHERE period = ?");
        $stmt->execute([$period]);
        return $stmt->fetchAll();
    }

    public function getFeesUpdate($studentId) {
        $stmt = $this->pdo->prepare("SELECT fees_paid FROM students WHERE user_id = ?");
        $stmt->execute([$studentId]);
        return $stmt->fetch();
    }

    public function submitComplaint($studentId, $complaint) {
        $stmt = $this->pdo->prepare("INSERT INTO complaints (student_id, complaint) VALUES (?, ?)");
        return $stmt->execute([$studentId, $complaint]);
    }

    public function getResults($studentId) {
        $stmt = $this->pdo->prepare("SELECT * FROM results WHERE student_id = ?");
        $stmt->execute([$studentId]);
        return $stmt->fetchAll();
    }
}

// Usage example
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentController = new StudentController($pdo);

    if (isset($_POST['submit_complaint'])) {
        $studentController->submitComplaint($_POST['student_id'], $_POST['complaint']);
    }
}
?>
