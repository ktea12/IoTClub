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
    if ($errMsg2 != "") {
        echo "<p> $errMsg2 </p>" ;
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
</body>
</html>