Vision of the App

I want to build an App which will record the Students, View Student Details , Update the Student Records and Delete it

Database Setup

Create a database called StudentDB

Create a Table called students

add the the following columns

Id : Primary Id , autoIncrement

Student Name

Course name

Student Email

Student Details

Config
make the PHP MYSQL Configuration here and it should be accesseble to other files from here
use mysql_connect and configure it

Index

Index will have a list of all the records displayed into a table
each row should have actions like update and delete

get the bootstrap CDN's
get the sample Table from bootstrap
import the config
write the sql to get all the records
and check to see if the Database is connecting
if the table has data them write the bootstrap table Header
use a while loop to loop through the rows and print the rows and columns of the table
also add the links for update and delete for each row

Create

Create a form which will add a new student record

add the following inputs fields Student Name

Course name

Student Email

Student Details
Submit button
add form Validations
also add php validations using empty trim
add form error messages

the form submit is self ( use php server super global) use post
wrap php code in POST Submit
collect the form input using POST super global
write the sql
execute the SQL
on sucessful Execution redirect back to index

Insert the record into the database

once succcessfully created redirect it to the main main which will who the created student record

Read

on the main page display all the student records

Display the Specific Student Record on the Display page

Update

Create a Form for updating the student Information

Populate the form with the current info

update the update info in the form

once updated redirect it to the main page
Delete

Prompt to confirm delete to the selected student

Delete the student record for the particular Student

---

Create the following Files

1. index.php // this is the main file
2. create.php // this is for creating a new student record
3. update.php // this is for updating a new student record
4. delete.php // deleting a record
5. read.php // for Reading the specific student details record
6. config.php // for storing config info the the project

Create Database
