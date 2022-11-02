<?php 
    include "conn.php";
    include "session.php";
    
    if (isset($_POST['add'])) {
        $idno = $_POST['idnumber'];
        $ln = $_POST['lname'];
        $fn = $_POST['fname'];
        $middle = $_POST['mi'];
        $age = $_POST['age'];
        $course = $_POST['course'];

        $sql = "INSERT INTO student_tbl(student_id, lastname, firstname, mi, age, course)
        VALUES('$idno', '$ln', '$fn', '$middle', '$age', '$course')";

        if ($conn->query($sql) === TRUE) {
            echo "New student record was successfully saved.";
            header('location: index.php');
        } else {
            echo "Unable to save student record due to following error" .$conn->connect_error;
            header('location: add.php');
        }

        $sql->close();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New student</title>
    <style>
        * {
            font-family: sans-serif;
            }
        body {
            background-color: rgb(213, 211, 158);
        }
            

        td {
            text-align: center;
            padding: 10px;
            background-color: rgb(251, 249, 180);
        }

        .tr-heading {
            background-color: rgb(240, 234, 53);
        }

        input {
            padding-left: 3px;
            margin: 5px;
        }
        
        .btn {
            padding: 5px 25px;
            margin: 5px;
            background-color: lightblue;
            border-radius: 1px;
            border: none;
            border-color: lightblue;
            transition: background-color 0.15s;
        }

        .btn:hover {
            background-color: skyblue;
        }

        .btn:active {
            background-color: blue;
        }
        button{
            border-color: black
            padding: 5px 25px;
            margin: 5px;
            background-color: lightblue;
            border-radius: 1px;
            border-color: lightblue;
            transition: background-color 0.15s;
            font-family: sans-serif;
        }

        button:hover {
            background-color; skyblue;
        }

        a {
            font-family: sans-serif;
            cursor: pointer;
            text-decoration: none; 
        }
    </style>
</head>
<body>
<button>

<a href="index.php">HOME</a>

</button> 
<h1 align="center">Add New Student</h1>
    <form action="add.php" method="post">
        <table border="1" width="30%" cellspacing="0" align="center">
            <tr>
                <td align="center" colspan="2" class="tr-heading">New Record</td>
            </tr>
            <tr>
                <td>ID Number</td>
                <td><input type="text" name="idnumber"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname"></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname"></td>
            </tr>
            <tr>
                <td>Middle Initial</td>
                <td><input type="text" name="mi"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age"></td>
            </tr>
            <tr>
                <td>Courses</td>
                <td>
                    <select name="course" id="">
                        <option value="BSET">BSET</option>
                        <option value="BSCPE">BSCPE</option>
                        <option value="BSIT">BSIT</option>
                        <option value="BSCS">BSCS</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="add" value="save" class="btn"> &nbsp;
                    <input type="reset" name="reset" value="Clear" class="btn">
                </td>
            </tr>
        </table>
    </form>
   
    
</body>
</html>