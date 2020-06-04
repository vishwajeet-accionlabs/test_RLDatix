WEATHER REPORT
Installation
For windows:
Install XAMPP on your Computer.
Make sure you are running php 7 and set the environment variable for php 7.
Make sure curl is also installed and set as environment variable
create database and tables using the file openweather.sql

Copy the project into the server space i.e xampp->htdocs and create a direcory with the name test_RLDatix paste the project here.

open the web browser/postman to run the weather report.

INPUT
If your XAMPP apache local server is running on default port i.e 80 then go to the url http://localhosttest_RLDatix/weather_report.php?zip=94040&country_code=us

If your XAMPP apache local server is running on any other port ( not default port ) Ex:8080 then go to the url http://localhost:8080/test_RLDatix/weather_report.php?zip=94040&country_code=us

With postman
Methos:POST
url:http://localhost:/test_RLDatix/weather_report.php (if running on default port) or http://localhost:8080/test_RLDatix/weather_report.php
key1: zip value:94040
key2:country_code value:us

OUTPUT:
Browser:
Inserted records:
{"city":5,"weather":5,"temprature":5}

postman:
Inserted records:<br>{
"city": 6,
"weather": 6,
"temprature": 6
}

open commandprompt

Check palindrome:

INPUT
D:\xampp\htdocs\test_RLDatix>php check_palindrome.php --val=madam

OUTPUT:
True

Reverse of string

INPUT
D:\xampp\htdocs\test_RLDatix>php get_reverse_string.php --val=madama

OUTPUT:
amadam

NOTE: Implementation of Dependancy injection can be observed in reverse_string.php file which is included in check_palindrome.php and get_reverse_string.php
