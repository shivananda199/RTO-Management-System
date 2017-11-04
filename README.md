# RTO-Management-System
A website basically built to issue driving license to citizens. Citizens can apply for learner's license, driving license, vehicle registration and monitor the status of application. Citizens can also submit complaints/queries.

Here are the steps to run the project:
1. Install XAMPP for Windows. Get to know to work with XAMPP. I recommend you to go through any online tutorial and get to know 
   how to run servers on local machine using XAMPP and how to create databases using XAMPP.
2. After doing whatever is mentioned in step 1, create a database with the name 'dbms_p1' (that's the name I gave to the database while
   running the project).
3. Create the required tables in the 'dbms_p1' by referring to the 'tables_to_be_created.pdf' file in the repo.
4. The downloaded project folder's name from git will be 'RTO-Management-System-Master' by default. You can rename it as you want. Find out    where XAMPP is installed on your computer. Usually, it will be in Windows 'C' directory. Place the entire project folder in 'htdocs'        folder inside 'xampp' folder. In my machine, the path to place the project folder is "C:\xampp\htdocs\".   
5. Start the Apache server and MySQL service in XAMPP (I'm assuming you have learnt the basics of XAMPP).
   Open up your browser and type 'localhost/RTO-Management-System-master' or 'localhost/<renamed_project_folder>'
