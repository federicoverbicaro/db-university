<?php

//EX QUERY CON JOIN


✅// 1. Selezionare tutti gli studenti iscritti al Corso di Laurea in Economia

✅/* 2. Selezionare tutti i Corsi di Laurea Magistrale del Dipartimento di
Neuroscienze */ 

✅// 3. Selezionare tutti i corsi in cui insegna Fulvio Amato (id=44)

✅/* 4. Selezionare tutti gli studenti con i dati relativi al corso di laurea a cui
 sono iscritti e il relativo dipartimento, in ordine alfabetico per cognome e
nome */

✅// 5. Selezionare tutti i corsi di laurea con i relativi corsi e insegnanti

✅/* 6. Selezionare tutti i docenti che insegnano nel Dipartimento di
Matematica (54) */

// 7. BONUS: Selezionare per ogni studente il numero di tentativi sostenuti
// per ogni esame, stampando anche il voto massimo. Successivamente,
// filtrare i tentativi con voto minimo 18.





/*1. Selezionare tutti gli studenti iscritti al Corso di Laurea in Economia*/

SELECT *
FROM Degrees
JOIN Students
ON Degrees.Id = Students.Degree_Id
WHERE Degrees.Name = 'Corso di Laurea in Economia';

/* 2. Selezionare tutti i Corsi di Laurea Magistrale del Dipartimento di
Neuroscienze */

SELECT * 
FROM `departments`
JOIN `degrees`
ON `degrees`.`department_id` = `departments`.`id`
WHERE `degrees`.`department_id`= 7;

/* 3. Selezionare tutti i corsi in cui insegna Fulvio Amato (id=44) */

SELECT * 
FROM `teachers`
JOIN `course_teacher`
ON `course_teacher`.`teacher_id` = `teachers`.`id`
WHERE `teachers`.`id`= 44;

/* 4. Selezionare tutti gli studenti con i dati relativi al corso di laurea a cui sono iscritti e il relativo dipartimento, in ordine alfabetico per cognome e nome */

SELECT students.*, degrees.name AS degree_name, departments.name AS department_name
FROM students
JOIN degrees 
ON degrees.id = students.degree_id
JOIN departments 
ON degrees.department_id = departments.id
ORDER BY students.surname, students.name;


/* 5. Selezionare tutti i corsi di laurea con i relativi corsi e insegnanti */

SELECT Degrees.name AS degree_name, Courses.name AS course_name, Teachers.name AS teacher_name
FROM Degrees
JOIN Courses 
ON degrees.id = courses.degree_id
JOIN Course_teacher 
ON Courses.id = Course_teacher.course_id
JOIN Teachers 
ON Course_teacher.teacher_id = Teachers.id;

/*6. Selezionare tutti i docenti che insegnano nel Dipartimento di Matematica (54)*/

SELECT DISTINCT Teachers.*, Departments.name AS department_name
FROM Teachers
JOIN Course_Teacher 
ON Teachers.id = Course_Teacher.Teacher_id
JOIN Courses ON Course_Teacher.Course_id = Courses.id
JOIN Degrees ON Courses.Degree_id = Degrees.id
JOIN Departments ON Degrees.Department_id = Departments.id
WHERE Departments.id = 5;