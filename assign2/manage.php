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
    $page = "manage";
    include_once ("header.inc");
?>
    <body id = "all_quiz">
    <div class="div1">

<?php
    error_reporting (E_ALL ^ E_NOTICE);

    $signed_in = false;
    $input_username = "";
    $input_password = "";
    
    if (!$signed_in) {
        echo("<h2>Admin Login:</h2>");
        echo('<form method="post" action="manage.php"> <!-- This should post to the same page -->');
        echo("<fieldset>");
        echo("<p>");
            echo('<label for="username">Username: </label>');
            echo('<input type = "text" name = "username" id = "username"/><br>');
            echo('<label for="password">Password: </label>');
            echo('<input type = "text" name = "password" id = "password"/><br>');          
        echo("</p>");
        echo("</fieldset>");
        echo('<input type= "submit" name = "somethin" value="Login"/>');
        echo('<input type= "reset" value="Reset Form"/>');
        echo("</form>");

        if ($_POST['somethin'] == 'Login') {
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if ($conn) {
                $input_username = trim(htmlspecialchars($_POST["username"]));
                $input_password = trim(htmlspecialchars($_POST["password"]));
                $query = "select username, password FROM AdminInfo ORDER BY username, password";
                $result = mysqli_query($conn, $query);
                if ($result){
                    $record = mysqli_fetch_assoc ($result);
                    if ($input_username == $record['username'] and $input_password == $record['password']) {
                        $signed_in = true;
                    }
                    else {
                        echo("<p>Incorrect details</p>");
                    }
                    mysqli_free_result($result);
                }
            }
        }
        elseif ($_POST['other'] == 'Search') {
            $signed_in = true;
        }
    }
    if ($signed_in) {
        echo("<h2>Search:</h2>");
        echo('<form method="post" action="manage.php"> <!-- This should post to the same page -->');
        echo("<fieldset>");
        echo("<p>");
            echo('<label for="studentid">Student ID</label>');
                echo('<input type = "text" name = "studentid" id = "studentid" maxlength = "10"/><br>');
            echo('<label for="fname">First name</label>');
                echo('<input type = "text" name = "fname" id = "fname" maxlength = "30" pattern="[A-Za-z- ]+"/><br>');
            echo('<label for="lname">Last name</label>');
                echo('<input type = "text" name = "lname" id = "lname" maxlength = "30" pattern="[A-Za-z- ]+"/><br>');
            echo('<label for="attempt_num">Attempt number</label>');
                echo('<input type = "text" name = "attempt_num" id = "attempt_num" maxlength = "1" pattern="\d{1}"/><br>');
            echo("<h3>Score</h3>");
            echo('<input type="radio" name="score" value="3" id="3" required="required">');
            echo('<label for="score">All</label>');
            echo('<input type="radio" name="score" value="5" id="5" required="required">');
            echo('<label for="score">100%</label>');
            echo('<input type="radio" name="score" value="2" id="2">');
            echo('<label for="score">less than 50%</label>');
                
        echo("</p>");
        echo("</fieldset>");
        echo('<input type= "submit" name = "other" value="Search"/>');
        echo('<input type= "reset" value="Reset Form"/>');
        echo('<input type="submit" name="action" value="Update" />');
        echo('<input type="submit" name="action" value="Delete" />');
        echo('<input type= "reset" value="Reset Form"/>');
        echo('</form>');
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn) {

            $studentid = trim(htmlspecialchars($_POST["studentid"]));
            $fname = trim(htmlspecialchars($_POST["fname"]));
            $lname = trim(htmlspecialchars($_POST["lname"]));
            $attempt_num = trim(htmlspecialchars($_POST["attempt_num"]));
            $score = trim(htmlspecialchars($_POST["score"]));

            echo "<p> Connection Successful!</p>";
            $sql_table = "ATTEMPTS";

        if ($_POST["score"]== 5){
            $query = "SELECT A.AttemptID, S.StudentID, S.FirstName, S.LastName, A.Attemptdate_time, A.NumberofAttempts, A.Score FROM Attempts A INNER JOIN StudentInfo S ON A.StudentID=S.StudentID WHERE S.StudentID like '%$studentid%' AND S.FirstName LIKE '%$fname%' AND S.LastName LIKE '%$lname%' AND A.NumberofAttempts LIKE '%$attempt_num%' and A.Score = 5";
        }
        else if ($_POST["score"]== 3){
            $query = "SELECT A.AttemptID, S.StudentID, S.FirstName, S.LastName, A.Attemptdate_time, A.NumberofAttempts, A.Score FROM Attempts A INNER JOIN StudentInfo S ON A.StudentID=S.StudentID WHERE S.StudentID like '%$studentid%' AND S.FirstName LIKE '%$fname%' AND S.LastName LIKE '%$lname%' AND A.NumberofAttempts LIKE '%$attempt_num%'";
            }
        else {
            $query = "SELECT A.AttemptID, S.StudentID, S.FirstName, S.LastName, A.Attemptdate_time, A.NumberofAttempts, A.Score FROM Attempts A INNER JOIN StudentInfo S ON A.StudentID=S.StudentID WHERE S.StudentID like '%$studentid%' AND S.FirstName LIKE '%$fname%' AND S.LastName LIKE '%$lname%' AND A.NumberofAttempts LIKE '%$attempt_num%' and A.Score<2.5";
        }
        

        $result = mysqli_query($conn, $query);
        if (!$result){
            echo "<p>Query Failed</p>";
        }
        else {
            echo "<p>Query successful</p>";
            $record = mysqli_fetch_assoc ($result);
            if ($record) {
                echo "<p>Matching results:</p>";
                echo "<table border='1'>";
                echo "<tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Attempt # (Descending)</th><th>Score</th></tr>";
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
            else {
                echo("<p>No matching results.</p>");
            }
        
        }
        mysqli_close($conn);
        }
        else {
            echo "<p>Connection Failed</p>";
        }
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