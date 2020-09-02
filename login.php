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
    $nameCheckQuery = "SELECT username, pwd FROM players WHERE username='" . $username . "';";  
    $nameCheck = mysqli_query($con, $nameCheckQuery) or die("2: Name check query failed"); //error code #2 = name check query failed
    if (mysqli_num_rows($nameCheck) != 1)
    {
        echo "5: Either no user with name or more then one"; //Error code #4 - number of names matching != 1

        exit();
    }

    //Check password
    //Get login info from query
    $existingInfo = mysqli_fetch_assoc($nameCheck);
    
    //$salt = existingInfo["mysalt"];
    //$hash = existingInfo["myhash"];
    $hashed_password = $existingInfo["pwd"];

    //$loginHash = crypt($password, $salt);

    //echo "Dhash = " . $hash . "\n";
    //echo "DloginHash = " . $loginHash;

/*     if ($hash != $loginHash)
    {
        echo "6: Incorrect password"; // Error code #6 - password does not hash to match table

        exit();
    } */

    if(password_verify($password, $hashed_password)) {
        echo("0\t" . $existingInfo["score"]);
    } 
    else{
        echo "6: Incorrect password"; // Error code #6 - password does not hash to match table
    }
    //echo("0\t" . $existingInfo["score"]);
?>