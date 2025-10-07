DROP DATABASE if exists company;
CREATE DATABASE company;
USE company;

    create table employees
    (
        id int auto_increment PRIMARY KEY,
        fname varchar(255),
        lname varchar(255)
    );

INSERT INTO employees(fname, lname)
values ( 'Peter',  'Pan'),
       ( 'Donale',  'Trup'),
       ( 'Brce',  'Wayne'),
       ('Max', 'Mustermann'),
       ('Neuer', 'Mustermannn'),
       ('maxi', 'minimann');

