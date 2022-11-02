<?php
    include "conn.php";

    $id = $_GET['idnum'];
    $sql = "DELETE FROM student_tbl WHERE student_id = '$id'";
    
    if ($conn->query($sql) === true) {
        echo "Success delete.";
        header('location: index.php');
    } else {
        echo "Unable to delete record.";
    }


?>