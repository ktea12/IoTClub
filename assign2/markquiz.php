<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="PHP" />
    <meta name="keywords" content="HTML5, PHP" />
    <meta name="author" content="IOT Club"  />
    <title>Marked Quiz</title>
</head>
<body>
<h1>Marked Quiz</h1>
<?php
$servername = "ictstu-db1.cc.swin.edu.au";
$username = "s103486878";
$password = "300303";
$dbname = "s103486878_db";

// $username = "s103815980";
// $password = "NNA_230802";
// $dbname = "s103815980_db";

// Check the index for attempts
// Check answer for Question3 

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
    $StudentID = sanities_input($_POST["StudentID"]);
    $device = sanities_input($_POST["device"]);

    if (isset ($_POST["FirstName"]))
        $FirstName = $_POST["FirstName"];
    else { 
        header ("location quiz.php") ;
    }
    if (isset ($_POST["LastName"]))
        $LastName = $_POST["LastName"];
        
    if (isset ($_POST["StudentID"]))
        $StudentID = $_POST["StudentID"];
    
    if (isset ($_POST["device"]))
        $device = $_POST["device"];

    $score = 0;
    $questions = array ("Kevin Ashton", "A laptop", "Data gathering", "Sensor", "19") ;
    
    if (isset ($_POST["coined"])){
       $questions[0] = $_POST["coined"] ;
       $score = $score + 1 ;
    }
    else {
     echo "<p> Your answer for Question-1 is incorrect </p>" ;
    }

     if (isset ($_POST["not_IOT_device"])) {
     $questions[1] = $_POST["not_IOT_device"] ;
     $score = $score + 1 ;
     }
     else {
     echo "<p> Your answer for Question-2 is incorrect </p>" ;
     }

     if (isset ($_POST["built_on[]"])) {
     $questions[2] = $_POST["built_on[]"] ;
     $score = $score + 1 ;
     }
     else { 
     echo "<p> Your answer for Question-3 is incorrect </p>" ;
     }

     if (isset ($_POST["device"])) {
     $questions[3] = $_POST["device"] ;
     $score = $score + 1 ;
     }
     else{ 
     echo "<p> Your answer for Question-4 is incorrect </p>" ;
     }


     if (isset ($_POST["question5"])) {
     $questions[4] = $_POST["question5"] ;
     $score = $score + 1 ;
     }
     else { 
     echo "<p> Your answer for Question-5 is incorrect </p>" ;
     }    
    
    //  Checking input validation
    $errMsg = "";
    $errMsg1 = "";
    $errMsg2 = "";
    $errMsg3 = "";
    $errMsg4 = "";

    if ($FirstName =="")  {
        $errMsg = "<p> You must enter your first name. </p>";
    }
    else if  (!preg_match("/^[a-zA-Z- ]{1,30}$/",$FirstName))  {
        $errMsg = "<p> Only alpha letters, hyphen and space allowed in your first name.</p>";
    }
    if ($errMsg != "") {
        echo "<p> $errMsg </p>" ;
    }

    if ($LastName =="")  {
        $errMsg1 = "<p> You must enter your last name. </p>";
    }
    else if  (!preg_match("/^[a-zA-Z- ]{1,30}$/",$LastName))  {
        $errMsg1 = "<p> Only alpha letters, hyphen and space allowed in your last name.</p>";
    }
    if ($errMsg1 != "") {
        echo "<p> $errMsg1 </p>" ;
    }

    if ($StudentID =="")  {
        $errMsg2 = "<p> You must enter your Student ID. </p>";
    }
    else if  (!preg_match("/^[0-9]\d{7}|\d{10}$/",$StudentID))  {
        $errMsg1 = "<p> Only numbers allowed in your student ID within a range of 7 to 10 numbers. </p>";
    }
    if ($errMsg1 != "") {
        echo "<p> $errMsg1 </p>" ;
    }

    if ($errMsg != "") {
        echo "<p>$errMsg<p>"; exit();
    }
    
    // Displaying message


?>
<?php
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

// Creating table if does not exist as a database,
$query = " CREATE TABLE IF NOT EXISTS `ATTEMPTS` (
    `AttemptID` int(11) PRIMARY KEY AUTO_INCREMENT,
    `Attemptdate_time` datetime ,
    `FirstName` varchar(20) ,
    `LastName` varchar(20) ,
    `StudentID` int(8) ,
    `NumberofAttempts` tinyint(4) ,
    `Score` int(11) 
  ); " ;

$results = mysqli_query($conn, $query);
if ($results){

$sql = "SELECT * FROM ATTEMPTS WHERE StudentID = " . $StudentID;
$result = mysqli_query($conn, $sql);
$attempt = mysqli_num_rows($result) ;

  
    // <a href="assign2/quiz.php">
    if ($attempt == 2) {
        echo "You have reached maximum limits of attempts for this quiz."; exit();
   } 
   else {
    $attempt = $attempt+1;
    $sql = "INSERT INTO ATTEMPTS (attemptdate_time, firstname, lastname, studentid, NumberofAttempts, score) " .
    "VALUES ('" . date('Y-m-d H:i:s') . "','$FirstName','$LastName', $StudentID, $attempt, $score) ";
    // echo $sql;

  

  if (mysqli_query($conn, $sql)) {
     echo " New record created successfully";

     
 echo "<p>Welcome $FirstName $LastName ! <br/>
 Student ID: $StudentID <br/>
 You have achieved a score of $score <br/>
 You had ", $attempt, " attempts for this quiz </p>";

     if ($attempt < 2) {
        // output data of each row
        // while($row = mysqli_fetch_assoc($result)) {
        //   echo "StudentId: " . $row["StudentID"].  " Name " . $row["FirstName"].  $row["LastName"]. " Attempt Date and Time: " . $row["Attemptdate_time"].  "<br>";
          echo "You still have attempts left for this quiz. </p>";
          echo "<p>Please refer back to the <a href='quiz.php'>Quiz page .</a>  </p>" ;
      }
   

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  

}
}
  mysqli_close($conn);
  ?>
</body>
</html>