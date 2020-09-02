<?php
    $con = mysqli_connect('localhost','root','root','UnityLoginApp');

    // Check that connection happened 
    if (mysqli_connect_errno())
    {
        echo "1: Connection failed"; // error code number 1 = connection failed

        exit();
    }

    $username = $_POST["name"];
    $password = $_POST["password"];

    // check if name exist
    $nameCheckQuery = "SELECT username FROM players WHERE username='" . $username . "';";  
    $nameCheck = mysqli_query($con, $nameCheckQuery) or die("2: Name check query failed"); //error code #2 = name check query failed
    if (mysqli_num_rows($nameCheck) > 0)
    {
        echo "3: Name already exists"; //Error code #3 - name exists, cannot register

        exit();
    }
    // Add user to the table
    //$salt = "\$5\$rounds=5000\$" . "saltandpepper" . $username . "\$";
    //$hash = crypt($password, $salt);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //var_dump($hashed_password);

    $insertUserQuery = "INSERT INTO players (username, pwd) VALUES ('" . $username . "', '" . $hashed_password . "');";

    mysqli_query($con, $insertUserQuery) or die("4: Insert player query failed"); //Error code #4 = insert query failed

    echo("0");
?>