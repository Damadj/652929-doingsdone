CREATE DATABASE doingsdone
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

  CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project CHAR(128),
    user_id INT
  );
  CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    creation_date DATE,
    completion_date DATE,
    task_name CHAR(128),
    file_link CHAR(128),
    time_limit DATE,
    user_id INT,
    project_id INT
  );
  CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    registration_date DATE,
    email CHAR(128),
    user_name CHAR(64),
    password CHAR(64),
    contact CHAR(128)
  );
  CREATE INDEX project ON categories(project);
  CREATE UNIQUE INDEX email ON users(email);
  CREATE UNIQUE INDEX user_name ON users(user_name);