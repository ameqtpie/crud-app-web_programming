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
    <title>Search result</title>
    <style>
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
            display: block;
            margin: 0 0 10px 0;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            border-color: blue;
            background-color: white;
            color: blue;
            transition: background-color 0.15s, color 0.15s;
        }

        button:hover {
            background-color: blue;
            color: white;
        }

        a {
            text-decoration: none;
        }

    </style>
</head>
<body>
<a href="index.php"><button>HOME</button></a>
    <table  width="75%" border="1" cellspacing="0" align="center">
        <tr>
            <th>ID Number</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle</th>
            <th>Age</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>

        <?php 
            if (isset($_GET['Search'])) {
                $search_key = $_GET['query'];
                $sql = "SELECT * FROM student_tbl WHERE lastname LIKE '%$search_key%' OR firstname  LIKE '%$search_key'";
                $result = $conn->query($sql);

                if  ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) {
                        $idno = $row['student_id'];
                        $ln = $row['lastname'];
                        $fn = $row['firstname'];
                        $mi = $row['mi'];
                        $age = $row['age'];
                        $course = $row['course'];
    ?>
    <tr>
        <td><?php echo $idno?></td>
        <td><?php echo $ln?></td>
        <td><?php echo $fn?></td>
        <td><?php echo $mi?></td>
        <td><?php echo $age?></td>
        <td><?php echo $course?></td>
        <td colspan="2">
            <a href="edit.php?idnum=<?php echo $idno; ?>">Edit</a>
            |
            <a href="delete.php?idnum=<?php echo $idno; ?>">delete</a>
        </td>
    </tr>
    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7">No record(s) found...</td>
                    </tr>
    <?php
                }
            }   
        
        ?>
    </table>
</body>
</html>