<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>INSERT</title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "xran39.skp-dp";
        $password = "k452ppy3";
        $db_name = "xran39_skp_dp_sde_dk";


        $conn = new mysqli($servername, $username, $password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Prepared statement
        $stmt = $conn->prepare("INSERT INTO ShoeSize (name, email, age, shoeSize)
               VALUES (?, ?, ?, ?)");
        // Bind to values from form. The form posts the names of the inputs.
        $stmt->bind_param("ssii", $_POST['name'], $_POST['email'], $_POST['age'], $_POST['shoeSize']);
        
        // Execute statement and check if it was successful
        if ($stmt->execute()) {
            // !!Redirect to list.php after submitting form!!
            header('location: redirect.html');
        } else {
            // Or display error
            echo "The SQL: '" . $sql . "' was faulty!<br>" . $conn->error;
        }

        $stmt->close();
        $conn->close();
        ?>
        <br>

        <p>Return to the front page</p>
        <a href="index.html">Home</a>
    </body>
</html>
