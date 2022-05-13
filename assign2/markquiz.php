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
$username = "s103815980";
$password = "NNA_230802";
$dbname = "s103815980_db";

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
     echo "<p> Your answer for Question-1 is incorect </p>" ;
    }

     if (isset ($_POST["not_IOT_device"])) {
     $questions[1] = $_POST["not_IOT_device"] ;
     $score = $score + 1 ;
     }
     else {
     echo "<p> Your answer for Question-2 is incorect </p>" ;
     }

     if (isset ($_POST["built_on[]"])) {
     $questions[2] = $_POST["built_on[]"] ;
     $score = $score + 1 ;
     }
     else { 
     echo "<p> Your answer for Question-3 is incorect </p>" ;
     }

     if (isset ($_POST["device"])) {
     $questions[3] = $_POST["device"] ;
     $score = $score + 1 ;
     }
     else{ 
     echo "<p> Your answer for Question-4 is incorect </p>" ;
     }


     if (isset ($_POST["question5"])) {
     $questions[4] = $_POST["question5"] ;
     $score = $score + 1 ;
     }
     else { 
     echo "<p> Your answer for Question-5 is incorect </p>" ;
     }    

    //  $attempts = 0
    //  if $StudentID > 3 {
    //  echo "<p> You have ($attempts-1) attempts left.</p>" ;
    //  echo "<p> Refer back to the quiz : <a href=\"quiz.php\"> form</a></p> " ;
    //  }
    //  else {
    // echo "You have reached the maximum limit to attempt this quiz."
    //  }
     

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
        echo "<p>$errMsg<p>";
    }
    else {
    echo "<p>Welcome $FirstName $LastName ! <br/>
    Student ID: $StudentID <br/>
    You have achieved a score of $score <br/> </p>";
    }

?>
<?php
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $sql = "SELECT * FROM ATTEMPTS WHERE StudentID = " . $StudentID;
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) < 3) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["AttemptID"]. " attempt: " . $row["Attemptdate_time"]. " Name" . $row["FirstName"].  $row["LastName"]. $row["StudentID"] . "<br>";
    }
    $sql = "INSERT INTO ATTEMPTS (attemptdate_time, firstname, lastname, studentid, score)
    VALUES ('" . date('Y-m-d H:i:s') . "','" . $FirstName . "','" . $LastName . "'," . $StudentID . "," . $score . ")";
    //echo $sql;

  if (mysqli_query($conn, $sql)) {
     echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    } else {
         echo "Sorry you reach your limit and get lost";
    }
  
  mysqli_close($conn);
  ?>
</body>
</html>