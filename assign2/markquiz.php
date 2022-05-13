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

    if (isset ($_POST["LastName"]))
        $LastName = $_POST["LastName"];
        
    if (isset ($_POST["StudentID"]))
        $StudentID = $_POST["StudentID"];
    
    if (isset ($_POST["device"]))
        $device = $_POST["device"];

    $errMsg = "";
    $errMsg1 = "";
    $errMsg2 = "";
    $errMsg3 = "";
    $errMsg4 = "";

    if ($FirstName =="")  {
        $errMsg = "<p> You must enter your first name. </p>";
    }
    else if  (!preg_match("/^[a-zA-Z-]{1,30}$/",$FirstName))  {
        $errMsg = "<p> Only alpha letters and hyphen allowed in your first name.</p>";
    }
    if ($errMsg != "") {
        echo "<p> $errMsg </p>" ;
    }

    if ($LastName =="")  {
        $errMsg1 = "<p> You must enter your last name. </p>";
    }
    else if  (!preg_match("/^[a-zA-Z-]{1,30}$/",$Lastname))  {
        $errMsg1 = "<p> Only alpha letters and hyphen allowed in your last name.</p>";
    }
    if ($errMsg1 != "") {
        echo "<p> $errMsg1 </p>" ;
    }

    if ($StudentID =="")  {
        $errMsg2 = "<p> You must enter your Student ID. </p>";
    }
    else if  (!preg_match("/^[0-9]\d{7}|\d{10}$/",$StudentID))  {
        $errMsg2 = "<p> Only alpha letters and hyphen allowed in your last name.</p>";
    }
    if ($errMsg2 != "") {
        echo "<p> $errMsg2 </p>" ;
    }

    if ($errMsg != "") {
        echo "<p>$errMsg<p>";
    }
    else {
    echo "<p>Welcome $firstname $lastname ! <br/>
    You are now booked on the $tour <br/> 
    Species: $species <br/>
    Age: $age <br/>
    Meal Preference: $food <br/>
    Number of travellers: $partySize</p>";
    }
?>
</body>
</html>