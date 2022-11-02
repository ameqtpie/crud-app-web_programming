<?php
 include "conn.php";
 include "session.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Students</title>
    <style>
        * {
        font-family: sans-serif;
        }
        body {
            background-color: rgb(213, 211, 158);
        }
        table {
            margin-bottom: 20px;
        }
        th {
        background-color: rgb(240, 234, 53);
        padding: 5px 5px;
        }
        td {
            text-align: center;
            padding: 10px;
            background-color: rgb(251, 249, 180);
        }

        button {
            background-color: rgb(240, 234, 53);
            border: none;
            border-radius: 5px;
            font-weight: 600;
            padding: 10px;
        }
        .search-td {
           background-color: rgb(240, 234, 53);
           cursor: pointer;
        }
        a {
        cursor: pointer;
        text-decoration: none;
        color: black;
        }

        a:hover {
            color: blue;
        }
    </style>
</head>
<body>
    <button><a href="add.php">Add New Student</a></button>
    <button><a href="logout.php">Logout</a></button>
    <form action="search-result.php" method="get">
        <table align="center">
            <tr>
                <td>Search:</td>
                <td><input type="text" name="query" placeholder="lastname or firstname"></td>
                <td class="search-td"><input type="submit" value="Search" name="Search" class="search-button"></td>
            </tr>
        </table>
    </form>
    <h1 align="center">Student List</h1>
    <table width="75%" border="1" cellspacing="0" align="center">
        <tr>
            <th>ID Number</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>MI</th>
            <th>Course</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
        <?php
            $sql = "SELECT * FROM student_tbl";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
            ?>
            <tr>
                <td><?php echo $row['student_id']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['mi']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td>
                    <a href="edit.php?idnum=<?php echo $row['student_id']; ?>">Edit</a>
                | 
                    
                    <a href="delete.php?idnum=<?php echo $row['student_id'];?>">Delete</a>

                </td>
            </tr>
        <?php
                } //end of while
            } else {
                ?>
               <tr class="no-record">
                <td colspan="7">No record to show...<td>
                </tr> 
              <?php 
            }

            $conn->close();
        ?>
    </table>
</body>
</html>