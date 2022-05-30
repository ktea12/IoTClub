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
    error_reporting(E_ERROR | E_PARSE);

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
        elseif ($_POST['action']) {
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
                
            
            echo("<h3>Input Score</h3>");
            echo("<strong>Score</strong>") ;
              echo ('<input type = "text" name = "score" id = "score" maxlength = "1" pattern="\d{1}"/> </p>');
            
            echo('<label for="equal">Equal to: </label>');
                echo('<input type="radio" name="compare" value="equal" id="equal">');
            echo('<label for="greater">Greater than: </label>');
                echo('<input type="radio" name="compare" value="greater" id="greater">');
            echo('<label for="less">Less than: </label>');
                echo('<input type="radio" name="compare" value="less" id="less">');
            

        echo("</p>");
        echo("</fieldset>");
        echo('<input type= "submit" name = "action" value="Search"/>');
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
            $score = intval(trim(htmlspecialchars($_POST["score"])));
            $compare = trim(htmlspecialchars($_POST["compare"]));

            echo "<p>Connection Successful!</p>";
            $sql_table = "ATTEMPTS";
            if ($_POST['action'] == 'Search') {
            if ($compare == "greater"){
                $query = "SELECT A.AttemptID, S.StudentID, S.FirstName, S.LastName, A.Attemptdate_time, A.NumberofAttempts, A.Score
                          FROM Attempts A 
                          INNER JOIN StudentInfo S
                           ON A.StudentID=S.StudentID 
                          WHERE S.StudentID like '%$studentid%' AND S.FirstName LIKE '%$fname%' AND S.LastName LIKE '%$lname%' AND A.NumberofAttempts LIKE '%$attempt_num%' and A.Score > $score ";
            }
            elseif ($compare == "less"){
                $query = "SELECT A.AttemptID, S.StudentID, S.FirstName, S.LastName, A.Attemptdate_time, A.NumberofAttempts, A.Score
                          FROM Attempts A 
                          INNER JOIN StudentInfo S 
                          ON A.StudentID=S.StudentID 
                          WHERE S.StudentID like '%$studentid%' AND S.FirstName LIKE '%$fname%' AND S.LastName LIKE '%$lname%' AND A.NumberofAttempts LIKE '%$attempt_num%' and A.Score < $score ";
            }
            elseif ($compare == "equal"){
                $query = "SELECT A.AttemptID, S.StudentID, S.FirstName, S.LastName, A.Attemptdate_time, A.NumberofAttempts, A.Score 
                          FROM Attempts A 
                          INNER JOIN StudentInfo S
                          ON A.StudentID=S.StudentID 
                          WHERE S.StudentID like '%$studentid%' AND S.FirstName LIKE '%$fname%' AND S.LastName LIKE '%$lname%' AND A.NumberofAttempts LIKE '%$attempt_num%' AND A.Score LIKE '%$score%'; ";
            }
            else {
                $query = "SELECT A.AttemptID, S.StudentID, S.FirstName, S.LastName, A.Attemptdate_time, A.NumberofAttempts, A.Score 
                          FROM Attempts A 
                          INNER JOIN StudentInfo S 
                          ON A.StudentID=S.StudentID 
                          WHERE S.StudentID like '%$studentid%' AND S.FirstName LIKE '%$fname%' AND S.LastName LIKE '%$lname%' AND A.NumberofAttempts LIKE '%$attempt_num%' AND A.Score > -1 ";
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
                echo "<tr><th>Attempt ID </th><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Attempt # (Descending)</th><th>Score</th><th> AttemptDate_Time</th></tr>";
                while ($record) {
                    echo "<tr><td>{$record['AttemptID']}</td>" ;
                    echo "<td>{$record['StudentID']}</td>";
                    echo "<td>{$record['FirstName']}</td>";
                    echo "<td>{$record['LastName']}</td>";
                    echo "<td>{$record['NumberofAttempts']}</td>";
                    echo "<td>{$record['Score']}</td>";
                    echo "<td>{$record['Attemptdate_time']}</td</tr>" ;
                    $record = mysqli_fetch_assoc ($result);
                }
                echo "</table>";
                mysqli_free_result($result);
            }
            else {
                echo("<p>NO MATCHING RESUL</p>");
            }
        
        }
    }
    
            
        elseif ($_POST['action'] == 'Delete') {
        $query_delete = " DELETE  
                          FROM   Attempts 
                          WHERE  StudentID = '$studentid' ";
      
        $result_delete = mysqli_query($conn, $query_delete) ;
        if ($result_delete){
        
        $query_delete_student= " DELETE 
                                 FROM   StudentInfo
                                 WHERE  StudentID = '$studentid' " ;
        $result_delete_student = mysqli_query($conn, $query_delete_student) ;

        if($result_delete_student) {
                
          echo "<p> DELETE SUCCESSFUL </p>" ;
          echo "<p> The record with Student ID: $studentid has been deleted </p>" ;
         $select_query = "SELECT A.AttemptID, S.StudentID, S.FirstName, S.LastName, A.Attemptdate_time, A.NumberofAttempts, A.Score 
                          FROM Attempts A 
                          INNER JOIN StudentInfo S
                          ON A.StudentID=S.StudentID " ;

         $result_select = mysqli_query($conn, $select_query) ;
         if ($result_select) {
           
         $record = mysqli_fetch_assoc($result_select);   
         if ($record){         
              
                echo "<table border='1'>";
                echo "<tr><th>Attempt ID </th><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Attempt # (Descending)</th><th>Score</th><th> AttemptDate_Time</th></tr>";
                while ($record) {
                    echo "<tr><td>{$record['AttemptID']}</td>" ;
                    echo "<td>{$record['StudentID']}</td>";
                    echo "<td>{$record['FirstName']}</td>";
                    echo "<td>{$record['LastName']}</td>";
                    echo "<td>{$record['NumberofAttempts']}</td>";
                    echo "<td>{$record['Score']}</td>";
                    echo "<td>{$record['Attemptdate_time']}</td</tr>" ;
                    $record = mysqli_fetch_assoc ($result_select);
                }
                echo "</table>";
                mysqli_free_result($result_select);
               }
            }
        }
             
            
        }
        else {
            echo "<p> DELETE UNSUCCESSFUL </p>" ;
        }
       

    }

    elseif ($_POST['action'] == 'Update') {
      $query_update= "UPDATE Attempts 
                      SET Score = $score
                      WHERE StudentID = $studentid AND NumberofAttempts = $attempt_num " ;
      
      $result = mysqli_query($conn, $query_update) ;
      if ($result){
          
          echo "<p> Update successful. </p>" ;
          $select_update = "SELECT A.AttemptID, S.StudentID, S.FirstName, S.LastName, A.Attemptdate_time, A.NumberofAttempts, A.Score 
                            FROM Attempts A 
                            INNER JOIN StudentInfo S
                            ON A.StudentID=S.StudentID 
                            WHERE A.StudentID like '%$studentid%' AND A.NumberofAttempts = '$attempt_num' " ;
         $result_select_update = mysqli_query($conn,$select_update ) ;
        
         if ($result_select_update) {
           
            $record = mysqli_fetch_assoc($result_select_update);
            if ($record) {
                echo "<p> The following record has been updated. <p>" ;
                echo "<table border='1'>";
                echo "<tr><th>Attempt ID </th><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Attempt # (Descending)</th><th>Score</th><th> AttemptDate_Time</th></tr>";
                while ($record) {
                    echo "<tr><td>{$record['AttemptID']}</td>" ;
                    echo "<td>{$record['StudentID']}</td>";
                    echo "<td>{$record['FirstName']}</td>";
                    echo "<td>{$record['LastName']}</td>";
                    echo "<td>{$record['NumberofAttempts']}</td>";
                    echo "<td>{$record['Score']}</td>";
                    echo "<td>{$record['Attemptdate_time']}</td</tr>";
                    $record = mysqli_fetch_assoc ($result_select_update);
                }
               
                echo "</table>";
                mysqli_free_result($result_select_update);
            }
        }
            
        }
        else {
            echo "<p> UPDATE UNSUCCESSFUL </p>" ;
        }
    }

   
        
        
        mysqli_close($conn);
      }
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