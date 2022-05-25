<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="UTF-8">
    <meta name="description" content="IoT Website">
    <meta name="keywords" content="HTML, CSS, IOT, Internet of Things, Manage">
    <meta name="author" content="IoT Club">
    <title>Manager</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>



    <?php
        require_once ("settings.php");
        include_once ("header.inc");
    ?>
    <body id = "all_quiz">
    <div class="div1">
    <h2>Search:</h2>
    <form method="post" action="<?php echo htmlspecialchars($dbname[" PHP_SELF "]);?>"> <!-- This should post to the same page -->
    <fieldset>
        <p>
            <label for="studentid">Student ID</label>
                <input type = "text" name = "studentid" id = "studentid"/><br>
            <label for="fname">First name</label>
                <input type = "text" name = "fname" id = "fname"/><br>
            <label for="lname">Last name</label> 
                <input type = "text" name = "lname" id = "lname"/><br>
            <label for="attempt_num">Attempt number</label> 
                <input type = "text" name = "attempt_num" id = "attempt_num"/><br>
            <label for="score">Score</label> 
                <input type = "text" name = "score" id = "score"/><br>
            
        </p>
    </fieldset>
    <input type= "submit" value="Search"/>
    <input type= "reset" value="Reset Form"/>
    </form>

    <?php
    
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn) {

            $studentid = trim(htmlspecialchars($_POST["studentid"]));
            $fname = trim(htmlspecialchars($_POST["fname"]));
            $lname = trim(htmlspecialchars($_POST["lname"]));
            $attempt_num = trim(htmlspecialchars($_POST["attempt_num"]));
            $score = trim(htmlspecialchars($_POST["score"]));

            echo "<p> Connection Successful!</p>";
            $sql_table = "ATTEMPTS";
            $query = "SELECT * from $sql_table WHERE StudentID = '$studentid%' AND FirstName LIKE '$fname%' AND LastName LIKE '$lname%' AND NumberofAttempts LIKE '$attempt_num%' AND Score LIKE '$score%'; ";
    
            $result = mysqli_query($conn, $query);
            if (!$result){
                echo "<p>Query Failed</p>";
            }
            else {
                echo "<p>Select successful</p>";
                $record = mysqli_fetch_assoc ($result);
                if ($record) {
                    echo "<table border='1'>";
                    echo "<tr><th>StudentID</th><th>FirstName</th><th>LastName</th><th>NumberofAttempts</th><th>Score</th></tr>";
                    while ($record) {
                        echo "<tr><td>{$record['StudentID']}</td>";
                        echo "<td>{$record['FirstName']}</td>";
                        echo "<td>{$record['LastName']}</td>";
                        echo "<td>{$record['NumberofAttempts']}</td>";
                        echo "<td>{$record['Score']}</td</tr>";
                        $record = mysqli_fetch_assoc ($result);
                    }
                    echo "</table>";
                    mysqli_free_result($result);
                }
            
            }
            mysqli_close($conn);
        }
        else {
            echo "<p>Connection Failed</p>";
        }
    ?>


</body>
    </div>
    </body>
    <!--Footer-->
    <?php
        include_once "footer.inc";
    ?>
</div>
</body