<?php 
    include "conn.php";
    include "session.php";
    

    $queryId = $_GET['idnum'];
    $sql = "SELECT * FROM student_tbl WHERE student_id = '$queryId'";
    $result = $conn->query($sql);
    $field = $result->fetch_assoc();

    if (isset($_POST['update'])) {
        $id = $_POST['idnumber'];
        $ln= $_POST['lname'];
        $fn = $_POST['fname'];
        $mi = $_POST['mi'];
        $age = $_POST['age'];
        $course = $_POST['course'];

        $sql = "UPDATE student_tbl SET lastname='$ln', firstname='$fn', mi='$mi', age='$age', course='$course' WHERE student_id='$id'";

        if ($conn->query($sql) === TRUE) {
            header('location:index.php');

        } else {
            echo "Unable to update student record due to ff error" . $conn->error;
        }

        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Record</title>
</head>
<body>
<form action="" method="post">
        <table border="1" width="30%" cellspacing="0">
            <tr>
                <td align="center" colspan="2">Edit Record</td>
            </tr>
            <tr>
                <td>ID Number</td>
                <td><input type="text" name="idnumber" value="<?php echo $field['student_id'];?>"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname" value="<?php echo $field['lastname'];?>"></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname" value="<?php echo $field['firstname'];?>"></td>
            </tr>
            <tr>
                <td>Middle Initial</td>
                <td><input type="text" name="mi" value="<?php echo $field['mi'];?>"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo $field['age'];?>"></td>
            </tr>
            <tr>
                <td>Courses</td>
                <td>
                    <select name="course" id="">
                        <option value="">Select course</option>
                        <option value="BSET">BSET</option>
                        <option value="BSCPE">BSCPE</option>
                        <option value="BSIT">BSIT</option>
                        <option value="BSCS">BSCS</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="update" value="Update" >
            
                </td>
            </tr>
        </table>
    </form>
</body>
</html>