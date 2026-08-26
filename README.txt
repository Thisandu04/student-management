STUDENT MANAGEMENT SYSTEM - SETUP GUIDE (WAMPServer + VS Code)
================================================================

STEP 1: Copy the project folder
--------------------------------
Copy the entire "student-management" folder into:
   C:\wamp64\www\
(so the final path looks like C:\wamp64\www\student-management\)

STEP 2: Start WAMP
-------------------
Make sure the WAMP tray icon is GREEN (both Apache and MySQL running).

STEP 3: Create the database
-----------------------------
1. Open http://localhost/phpmyadmin/ in your browser
2. Click "New" on the left sidebar
3. Name the database: student_db
4. Click Create
5. Click on student_db, then go to the "SQL" tab
6. Paste this and click "Go":

CREATE TABLE students (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    student_id VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(100),
    course VARCHAR(100),
    grade VARCHAR(5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

STEP 4: Run the project
-------------------------
Open your browser and go to:
   http://localhost/student-management/

You should see the Student Management System homepage.
Click "+ Add New Student" to test adding a record.

STEP 5: Open the code in VS Code
-----------------------------------
In VS Code: File > Open Folder > select the student-management folder
(the one inside C:\wamp64\www\)

TROUBLESHOOTING
-----------------
- "Connection failed" error -> check config/db.php matches your MySQL
  username/password (WAMP default is user "root", password "" blank)
- Blank page -> check WAMP is green, and you're using http://localhost/
  NOT a file:// path
- "Table doesn't exist" -> re-check Step 3, make sure the SQL ran successfully

FILE-BY-FILE LEARNING ORDER (recommended)
--------------------------------------------
1. config/db.php   -> understand the connection first
2. index.php        -> see how data is READ and displayed (SELECT)
3. add.php           -> see how data is CREATED (INSERT)
4. edit.php          -> see how data is UPDATED (UPDATE)
5. delete.php        -> see how data is DELETED (DELETE)
6. css/style.css    -> tweak colors/layout once it's working
7. js/script.js     -> see how JS adds validation on top of PHP
