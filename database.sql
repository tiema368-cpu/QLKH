-- Tạo database
CREATE DATABASE IF NOT EXISTS `if0_40405056_science_products` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `if0_40405056_science_products`;

-- Bảng đề tài nghiên cứu
CREATE TABLE IF NOT EXISTS `research_topics` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `lecturer_id` VARCHAR(50),
    `name` VARCHAR(255) NOT NULL,
    `code` VARCHAR(100) NOT NULL,
    `level` ENUM('national', 'ministry', 'provincial', 'university') NOT NULL,
    `start_year` YEAR NOT NULL,
    `end_year` YEAR NOT NULL,
    `budget` DECIMAL(15,2),
    `status` ENUM('ongoing', 'completed', 'cancelled') NOT NULL,
    `role` ENUM('leader', 'member') NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng bài báo khoa học
CREATE TABLE IF NOT EXISTS `scientific_papers` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `lecturer_id` VARCHAR(50),
    `title` VARCHAR(500) NOT NULL,
    `journal` VARCHAR(255) NOT NULL,
    `authors` TEXT NOT NULL,
    `year` YEAR NOT NULL,
    `volume` VARCHAR(50),
    `pages` VARCHAR(50),
    `doi` VARCHAR(100),
    `indexing` ENUM('scopus', 'isi', 'other') NOT NULL,
    `role` ENUM('first', 'corresponding', 'coauthor') NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng sách/giáo trình
CREATE TABLE IF NOT EXISTS `books` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `lecturer_id` VARCHAR(50),
    `title` VARCHAR(500) NOT NULL,
    `isbn` VARCHAR(50),
    `publisher` VARCHAR(255) NOT NULL,
    `year` YEAR NOT NULL,
    `pages` INT,
    `type` ENUM('textbook', 'reference', 'monograph', 'handbook') NOT NULL,
    `role` ENUM('author', 'editor', 'coauthor', 'translator') NOT NULL,
    `co_authors` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng hướng dẫn sinh viên
CREATE TABLE IF NOT EXISTS `student_guidance` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `lecturer_id` VARCHAR(50),
    `student_name` VARCHAR(255) NOT NULL,
    `student_id` VARCHAR(50) NOT NULL,
    `level` ENUM('undergraduate', 'master', 'phd', 'research') NOT NULL,
    `topic` TEXT NOT NULL,
    `start_year` YEAR NOT NULL,
    `end_year` YEAR,
    `status` ENUM('ongoing', 'completed', 'defended', 'cancelled') NOT NULL,
    `role` ENUM('supervisor', 'co-supervisor', 'advisor') NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng giải thưởng
CREATE TABLE IF NOT EXISTS `awards` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `lecturer_id` VARCHAR(50),
    `name` VARCHAR(255) NOT NULL,
    `level` ENUM('international', 'national', 'ministry', 'provincial', 'university') NOT NULL,
    `year` YEAR NOT NULL,
    `organization` VARCHAR(255) NOT NULL,
    `category` ENUM('research', 'teaching', 'innovation', 'technology', 'social', 'other') NOT NULL,
    `description` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng giảng viên
CREATE TABLE IF NOT EXISTS `lecturers` (
    `id` VARCHAR(50) PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `faculty` VARCHAR(255) NOT NULL,
    `department` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);