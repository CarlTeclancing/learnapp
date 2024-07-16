-- Database: student_management_system

CREATE DATABASE IF NOT EXISTS student_management_system;
USE student_management_system;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Students table
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY PRIMARY KEY,
    user_id INT,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    fees_paid DECIMAL(10, 2) DEFAULT 0.00,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Teachers table
CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE
);

-- Courses table
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY PRIMARY KEY,
    title VARCHAR(100),
    description TEXT
);

-- Attendance table
CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY PRIMARY KEY,
    student_id INT,
    course_id INT,
    date DATE,
    status ENUM('present', 'absent'),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

-- Course outline table
CREATE TABLE course_outlines (
    id INT AUTO_INCREMENT PRIMARY PRIMARY KEY,
    course_id INT,
    outline TEXT,
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

-- Course coverage table
CREATE TABLE course_coverage (
    id INT AUTO_INCREMENT PRIMARY PRIMARY KEY,
    course_id INT,
    student_id INT,
    coverage_percent DECIMAL(5, 2),
    FOREIGN KEY (course_id) REFERENCES courses(id),
    FOREIGN KEY (student_id) REFERENCES students(id)
);

-- Student spotlight table
CREATE TABLE student_spotlights (
    id INT AUTO_INCREMENT PRIMARY PRIMARY KEY,
    student_id INT,
    period ENUM('day', 'week', 'month'),
    date DATE,
    FOREIGN KEY (student_id) REFERENCES students(id)
);

-- Complaints table
CREATE TABLE complaints (
    id INT AUTO_INCREMENT PRIMARY PRIMARY KEY,
    student_id INT,
    complaint TEXT,
    response TEXT,
    status ENUM('open', 'closed') DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id)
);

-- Results table
CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY PRIMARY KEY,
    student_id INT,
    course_id INT,
    result DECIMAL(5, 2),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

-- Settings table
CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY PRIMARY KEY,
    setting_key VARCHAR(100),
    setting_value TEXT
);
