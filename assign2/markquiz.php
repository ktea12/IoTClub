<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="PHP" />
    <meta name="keywords" content="HTML5, PHP" />
    <meta name="author" content="IOT Club"  />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Marked Quiz</title>
</head>
<body id = "all_quiz">
<?php
        $page = "feedback_page";
        include_once ("header.inc");
    ?>
<div class="div1">
<?php
    require_once ("settings.php");

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<?php
    function sanities_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!-- sanitise input -->
<?php
    $FirstName = sanities_input($_POST["FirstName"]);
    $LastName = sanities_input($_POST["LastName"]);
    $StudentID = strval(sanities_input($_POST["StudentID"]));
    $device = sanities_input($_POST["device"]);

    $valid = true; // Used to check if program should continue - no if bad input
    if ((!isset ($FirstName) or $FirstName == "") or (!isset ($LastName) or $LastName == "") or (!isset ($StudentID) or $StudentID == "")) {
        echo "<p>Error with student details:</p>";

        //  Specific error messages   
        if ($FirstName =="")  {
            echo "<p> You must enter your first name. </p>";
        }
        else if  (!preg_match("/^[a-zA-Z- ]{1,30}$/",$FirstName))  {
            echo "<p> Only alpha letters, hyphen and space allowed in your first name.</p>";
        }

        if ($LastName =="")  {
            echo "<p> You must enter your last name. </p>";
        }
        else if  (!preg_match("/^[a-zA-Z- ]{1,30}$/",$LastName))  {
            echo "<p> Only alpha letters, hyphen and space allowed in your last name.</p>";
        }
    
        if ($StudentID =="")  {
            echo "<p> You must enter your Student ID. </p>";
        }
        else if  (!preg_match("/^[0-9]\d{7}|\d{10}$/",$StudentID))  {
            echo "<p> Only numbers allowed in your student ID within a range of 7 to 10 numbers. </p>";
        }

        echo "<p>Please refer back to the <a href='quiz.php'>Quiz page .</a>  </p>" ;
        $valid = false;
    }

?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<?php
if ($valid){
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $questions_valid = true; // Used to check if all questions are set
    $_POST["device"] = strtolower(trim($_POST["device"]));
    if (!$_POST["built_on"]){
        $questions_valid = false;
    }
    foreach( $_POST as $answer ) {  
        if($answer == "") {
            $questions_valid = false;
        }
    }

        
    if ($questions_valid){
        $score = 0;
        $questions = array ("Kevin Ashton", "A laptop", ["Cloud computing", "Data gathering sensors", "Interconnected devices"], "sensor", 3) ;
        
        # Question 1:
        if ($questions[0] == $_POST["coined"]){
            $score = $score + 1 ;
            $answer_feedback = "<p>Question 1: ✅</p>";
        }
        else {
            $answer_feedback = "<p>Question 1: ❌</p>";
        }
    
        # Question 2:
        if ($questions[1] == $_POST["not_IOT_device"]) {
            $score = $score + 1 ;
            $answer_feedback .= "<p>Question 2: ✅</p>";
        }
        else {
            $answer_feedback .= "<p>Question 2: ❌</p>";
        }
    
        # Question 3:
        if ($questions[2] == $_POST["built_on"]) {
            $score = $score + 1 ;
            $answer_feedback .= "<p>Question 3: ✅</p>";
        }
        else { 
            $answer_feedback .= "<p>Question 3: ❌</p>";
        }

        # Question 4:
        if ($questions[3] == $_POST["device"]) {
            $score = $score + 1 ;
            $answer_feedback .= "<p>Question 4: ✅</p>";
        }
        else{ 
            $answer_feedback .= "<p>Question 4: ❌</p>";
        }
    
        # Question 5:
        if ($questions[4] == $_POST["question5"]) {
            $score = $score + 1 ;
            $answer_feedback .= "<p>Question 5: ✅</p>";
        }
        else { 
            $answer_feedback .= "<p>Question 5: ❌</p>";
        }

        if ($score > 0) {
            // Creating table if does not exist as a database,
            $query_student = " CREATE TABLE IF NOT EXISTS `StudentInfo` (
                `StudentID` int(10) PRIMARY KEY,
                `FirstName` varchar(30),
                `LastName` varchar(30)
                 ); " ;
            
            $result_student = mysqli_query($conn, $query_student) ;

            if ($result_student) {
                $query = " CREATE TABLE IF NOT EXISTS`Attempts`(
                `AttemptID` INT(11) PRIMARY KEY AUTO_INCREMENT,
                `StudentID` INT(10),
                 FOREIGN KEY (StudentID) REFERENCES `StudentInfo` (StudentID) ,
                `Attemptdate_time` DATETIME,
                `NumberofAttempts` TINYINT(1),
                `Score` TINYINT(1)
            ); " ;
            }

        
            $results = mysqli_query($conn, $query);
           
            if ( ($results)){
                $sql1 = "SELECT * FROM Attempts A INNER JOIN StudentInfo S ON A.StudentID=S.StudentID WHERE S.StudentID = $StudentID";
                $result = mysqli_query($conn, $sql1);
                $attempt = mysqli_num_rows($result); 
              
                // <a href="assign2/quiz.php">
                $attempt = $attempt+1;
                if ($attempt > 2) {
                    echo "You have already attempted this quiz twice."; exit();
                } 
                else {
                   echo ("<p>$answer_feedback</p>");
                  
                   
                    $query_new = "SELECT * FROM StudentInfo WHERE studentid=$StudentID "   ;
                    $check =mysqli_query($conn, $query_new) ;

                    if (mysqli_num_rows($check)==0) {
                    $sql_student = "INSERT INTO StudentInfo (firstname, lastname, studentid) " .
                    "VALUES ('$FirstName','$LastName', $StudentID) ";
                    $check1 = mysqli_query($conn,$sql_student) ;
                    if ($attempt == 1) {
                        echo "<p> Please refer back to the <a href='quiz.php'> QUIZ PAGE </a> for another attempt. </p>";
                    } 
                }
                
                $sql = "INSERT INTO Attempts (attemptdate_time, studentid, NumberofAttempts, score) " .
                "VALUES ('" . date('Y-m-d H:i:s') . "', $StudentID, $attempt, $score) ";

                
                if (mysqli_query($conn, $sql) ) {
                    echo "<p>Welcome $FirstName $LastName! <br/>
                    Student ID: $StudentID <br/>
                    You have achieved a score of $score <br/>
                    You have ", 2 - $attempt , " attempt(s) remaining for this quiz </p>";
                }

            }
               
            
        }
            mysqli_close($conn);

        }
        
        else {
            echo"<p>Database not created:
            Score must exceed 0.</p>";
        }
    }
    else{
        echo"<p>Please answer ALL questions.</p>";
    }
}
    
?>
</div>
<?php include_once "footer.inc"?>;
</body>
</html>