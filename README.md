# SilverStreet code Assignment 
By Thierno Abdoul Rahimi Diallo rahimi.diallo@224tech.com
 
 ## Need To Have  
 To run this project it you most have an apache serverinstall on your computer.
 
## What is included

After unzipping `sliverStreet_assignment_by_rahimi` or cloning from the git repository ``

`cd sliverStreet_assignment_by_rahimi`

in the sliverStreet_assignment_by_rahimi folder you will:

- The api folder which hold the the rest api
- The config folder which hold the configuration part for the php
- The db folder which hold an exported file of the database in json format.
- The models folder which hold the model used to create sms and email object.

## How to set up 

- Go `cd sliverStreet_assignment_by_rahimi`
- In phpMyadmin create a database named `sabr` and then import the database file from the `DB` folder.
- Change the `username` and `password` in the config folder `Database.php` file to your username and password.

## Run

- SMS endPoint

1) List all messages: `http://localhost:8080/sliverStreet_assignment_by_rahimi/api/sms/smsSummary.php`.

2) Consume SMS: `http://localhost:8080/sliverStreet_assignment_by_rahimi/api/sms/consumeSms.php?id=5`

3) Input SMS: `http://localhost:8080/sliverStreet_assignment_by_rahimi/api/sms/inputSms.php` for this part i use postman to test the api and i passed the data to the body as json forma.
`{
	"sender": "0178819454",
	"sms_content": "this is the first test for smsSummary."
}`

4) HTML Page: `http://localhost:8080/sliverStreet_assignment_by_rahimi/`

- EMAIL endPoint 

1) List all messages: `http://localhost:8080/sliverStreet_assignment_by_rahimi/api/sms/emailSummary.php`.

2) Consume SMS: `http://localhost:8080/sliverStreet_assignment_by_rahimi/api/sms/consumeEmail.php?id=5` need to pass the id.

3) Input SMS: `http://localhost:8080/sliverStreet_assignment_by_rahimi/api/sms/inputEmail.php` for this part i use postman to test the api and i passed the data to the body as json forma.
`{
	"sender": "rahimi.diallo@224tech.com",
	"sms_content": "this is the first test for smsSummary."
}`

