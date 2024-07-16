<?php
include '../config/database.php';

class AdminController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getStudents() {
        $stmt = $this->pdo->query("SELECT * FROM students");
        return $stmt->fetchAll();
    }

    public function createStudent($name, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO students (name, email) VALUES (?, ?)");
        return $stmt->execute([$name, $email]);
    }

    public function createTeacher($name, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO teachers (name, email) VALUES (?, ?)");
        return $stmt->execute([$name, $email]);
    }

    public function assignRoleToTeacher($teacherId, $role) {
        $stmt = $this->pdo->prepare("UPDATE teachers SET role = ? WHERE id = ?");
        return $stmt->execute([$role, $teacherId]);
    }

    public function updateAttendance($studentId, $courseId, $status) {
        $stmt = $this->pdo->prepare("UPDATE attendance SET status = ? WHERE student_id = ? AND course_id = ?");
        return $stmt->execute([$status, $studentId, $courseId]);
    }

    public function updateCourseOutline($courseId, $outline) {
        $stmt = $this->pdo->prepare("UPDATE course_outlines SET outline = ? WHERE course_id = ?");
        return $stmt->execute([$outline, $courseId]);
    }

    public function addStudentToSpotlight($studentId, $period) {
        $stmt = $this->pdo->prepare("INSERT INTO student_spotlights (student_id, period) VALUES (?, ?)");
        return $stmt->execute([$studentId, $period]);
    }

    public function respondToComplaint($complaintId, $response) {
        $stmt = $this->pdo->prepare("UPDATE complaints SET response = ?, status = 'closed' WHERE id = ?");
        return $stmt->execute([$response, $complaintId]);
    }

    public function getSiteSettings() {
        $stmt = $this->pdo->query("SELECT * FROM settings");
        return $stmt->fetchAll();
    }

    public function updateSiteSettings($key, $value) {
        $stmt = $this->pdo->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?");
        return $stmt->execute([$value, $key]);
    }
}

// Usage example
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminController = new AdminController($pdo);

    if (isset($_POST['create_student'])) {
        $adminController->createStudent($_POST['name'], $_POST['email']);
    } elseif (isset($_POST['create_teacher'])) {
        $adminController->createTeacher($_POST['name'], $_POST['email']);
    } elseif (isset($_POST['assign_role'])) {
        $adminController->assignRoleToTeacher($_POST['teacher_id'], $_POST['role']);
    } elseif (isset($_POST['update_attendance'])) {
        $adminController->updateAttendance($_POST['student_id'], $_POST['course_id'], $_POST['status']);
    } elseif (isset($_POST['update_course_outline'])) {
        $adminController->updateCourseOutline($_POST['course_id'], $_POST['outline']);
    } elseif (isset($_POST['add_student_spotlight'])) {
        $adminController->addStudentToSpotlight($_POST['student_id'], $_POST['period']);
    } elseif (isset($_POST['respond_complaint'])) {
        $adminController->respondToComplaint($_POST['complaint_id'], $_POST['response']);
    } elseif (isset($_POST['update_site_setting'])) {
        $adminController->updateSiteSettings($_POST['setting_key'], $_POST['setting_value']);
    }
}
?>
