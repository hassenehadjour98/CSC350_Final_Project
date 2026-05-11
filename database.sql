CREATE DATABASE IF NOT EXISTS cs_project;

USE cs_project;

CREATE TABLE IF NOT EXISTS grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judge_name VARCHAR(100),
    group_number VARCHAR(20),
    project_title VARCHAR(100),
    total INT
);