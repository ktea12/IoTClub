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
        $host = "ictstu-db1.cc.swin.edu.au";
        $user = "s103486878";
        $pwd = "300303";
        $sql_db = "s103486878_db";
        $page = "manage";
        include_once ("header.inc");
    ?>
    <body id = "all_quiz">
    <div class="div1">
    <?php
        require_once "settings.php";
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            echo "<p> Database connection failure. </p>" ;
        }
         else {
            echo "<p> Connection Successful!</p>";
            $query = "SELECT A.AttemptID,  S.StudentID, S.FirstName, S.LastName, A.Attemptdate_time, A.NumberofAttempts, A.Score FROM Attempts A INNER JOIN StudentInfo S ON A.StudentID=S.StudentID ";
            $result = mysqli_query($conn, $query);
<<<<<<< Updated upstream
=======
            if (!$result){
                echo "<p>Query Failed</p>";
            }
            else {
                echo "<p>Select successful</p>";
                $record = mysqli_fetch_assoc ($result);
                if ($record) {
                    echo "<p>Connection Successful!</p>";
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
                else {
                    echo("<p>Select unsuccessful</p>");
                }
>>>>>>> Stashed changes
            
           if (!$result){
               echo "<p> Something wrong with", $query,"</p>" ;
           }
           else {
               echo "<table border=\"1\">\n" ;
               echo "<tr>\n "
               ."<th scope=\"col\">AttemptID</th>\n "
               ."<th scope=\"col\">StudentID</th>\n "
               ."<th scope=\"col\">FirstName</th>\n "
               ."<th scope=\"col\">LastName</th>\n "
               ."<th scope=\"col\">Attemptdate_time</th>\n "
               ."<th scope=\"col\">NumberofAttempts</th>\n "
               ."<th scope=\"col\">Score</th>\n "
                ."</tr>\n ";
            
            while ($row = mysqli_fetch_assoc($result)){
                echo "<tr>\n " ;
                echo "<td>", $row["AttemptID"], "<td>\n " ;
                echo "<td>", $row["StudentID"], "<td>\n " ;
                echo "<td>", $row["FirstName"], "<td>\n " ;
                echo "<td>", $row["LastName"], "<td>\n " ;
                echo "<td>", $row["Attemptdate_time"], "<td>\n " ;
                echo "<td>", $row["NumberofAttempts"], "<td>\n " ;
                echo "<td>", $row["Score"], "<td>\n " ;
                echo "</tr>\n ";
            }
           
        echo "</table>\n" ;
           }
        
            mysqli_close($conn);
        }
    
    ?>
    </div>
    </body>
    <!--Footer-->
    <?php
        include_once "footer.inc";
    ?>
</div>
</body