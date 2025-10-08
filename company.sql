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


