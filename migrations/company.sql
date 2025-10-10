DROP DATABASE IF EXISTS company;
CREATE DATABASE company;
USE company;

CREATE TABLE employees
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255),
    lname VARCHAR(255)
);

CREATE TABLE department
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

INSERT INTO employees(fname, lname)
VALUES ('Peter', 'Pan'),
       ('Donale', 'Trup'),
       ('Brce', 'Wayne'),
       ('Max', 'Mustermann'),
       ('Neuer', 'Mustermannn'),
       ('maxi', 'minimann');


ALTER TABLE department
    ADD is_hiring BOOLEAN DEFAULT FALSE,
    ADD work_mode ENUM('remote','hybrid','onsite') DEFAULT 'onsite',
    ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
