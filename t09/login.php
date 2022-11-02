<?php 
    include "conn.php";
    session_start();

    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql ="SELECT * FROM users WHERE username ='$user' AND password ='$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['uname'] = $row['username'];
            }
            header('location:index.php');
        } else {
        ?>
          <script> alert("Invalid username or password. Please try again."); </script>
        
        <?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    body {
        background-color: rgb(213, 211, 158);
    }
    h1 {
        margin: 0 auto;
    }
    table {
        margin: 0 auto;
        border: none;
    }
    th {
        background-color: rgb(240, 234, 53);
        padding: 10px 15px;
        border: none;
        }
        td {
            padding: 10px;
            background-color: rgb(251, 249, 180);
            border: none;
        }

    .login-btn {
        padding: 2px 10px;
        
    }
</style>
<body>

<div>
    <h1 align="center">LOGIN PAGE</h1>
    <form action="login.php" method="post">
        <table border="1" cellspacing="0">
            <tr>
                <th colspan="2">Login</th>
            </tr>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Login" name="login" class="login-btn">
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>