<?php
// EX QUERY CON SELECT

✅// 1. Selezionare tutti gli studenti nati nel 1990 (160)
✅// 2. Selezionare tutti i corsi che valgono più di 10 crediti (479)
✅// 3. Selezionare tutti gli studenti che hanno più di 30 anni
✅/* 4. Selezionare tutti i corsi del primo semestre del primo anno di un qualsiasi corso di
laurea (286) */ 
✅/* 5. Selezionare tutti gli appelli d'esame che avvengono nel pomeriggio (dopo le 14) del
20/06/2020 (21)*/ 
✅// 6. Selezionare tutti i corsi di laurea magistrale (38)
✅// 7. Da quanti dipartimenti è composta l'università? (12)
✅// 8. Quanti sono gli insegnanti che non hanno un numero di telefono? (50)



/*1. Selezionare tutti gli studenti nati nel 1990 (160) */

SELECT *
FROM `students`
WHERE YEAR(date_of_birth) = 1990;


/*2. Selezionare tutti i corsi che valgono più di 10 crediti (479)*/

SELECT * 
FROM `courses`
WHERE `cfu` > 10; 


/*3. Selezionare tutti gli studenti che hanno più di 30 anni*/

SELECT * 
FROM `students`
WHERE YEAR(date_of_birth) < 1993; 


/*  4. Selezionare tutti i corsi del primo semestre del primo anno di un qualsiasi corso di
laurea (286)*/

SELECT *
FROM `courses`
WHERE `year` = 1 
AND `period` 
LIKE  'I semestre';


/* 5. Selezionare tutti gli appelli d'esame che avvengono nel pomeriggio (dopo le 14) del
20/06/2020 (21) */

SELECT * 
FROM `exams`
WHERE DATE(date) = '2020-06-20'
AND TIME(hour) > '14:00';


/*6. Selezionare tutti i corsi di laurea magistrale (38)*/

SELECT * 
FROM `degrees`
WHERE `level` = 'magistrale'



/*7. Da quanti dipartimenti è composta l'università? (12)*/

SELECT * 
FROM `departments`



/* 8. Quanti sono gli insegnanti che non hanno un numero di telefono? (50)*/

SELECT * 
FROM `teachers`
WHERE `phone` IS NOT NULL;






// EX QUERY CON GROUP BY

✅// 1. Contare quanti iscritti ci sono stati ogni anno
✅// 2. Contare gli insegnanti che hanno l'ufficio nello stesso edificio
✅// 3. Calcolare la media dei voti di ogni appello d'esame
✅// 4. Contare quanti corsi di laurea ci sono per ogni dipartimento






/*1. Contare quanti iscritti ci sono stati ogni anno */

SELECT registration_number, COUNT(name) AS number_of_degrees
FROM `students`
GROUP BY registration_number;



/* 2. Contare gli insegnanti che hanno l'ufficio nello stesso edificio */

SELECT COUNT(id), office_address
FROM `teachers`
GROUP BY office_address;

/*3. Calcolare la media dei voti di ogni appello d'esame */

SELECT student_id, AVG(vote) AS vote_media 
FROM `exam_student`
GROUP BY student_id;



/*4. Contare quanti corsi di laurea ci sono per ogni dipartimento */

SELECT department_id, COUNT(name) AS number_of_degrees
FROM `degrees`
GROUP BY department_id;



