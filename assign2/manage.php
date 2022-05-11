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

<body>
    <?php
        $page = "manage";
        include_once ("header.inc");

        require_once "settings.php";
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);
        if ($conn) {
            echo "<p> Connection Successful!</p>";
            $query = "Select: Student ID, First name, Last name, Percentage, Attempt number";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<p>Select successful</p>";
                $record = mysqli_fetch_assoc ($result);
                if ($record) {
                    echo "<table border='1'>";
                    echo "<tr><th>ID</th><th>First name</th><th>Last name</th><th>Percentage</th><th>Attempt #</th></tr>";
                    while ($record) {
                        echo "<tr><td>{$record['StudentID']}</td>";
                        echo "<td>{$record['FirstName']}</td>";
                        echo "<td>{$record['LastName']}</td>";
                        echo "<td>{$record['Percentage']}</td>";
                        echo "<td>{$record['AttemptNum']}</td</tr>";
                        $record = mysqli_fetch_assoc ($result);
                    }
                    echo "</table>";
                    mysqli_free_result($result);
                }
                else{
                    echo("<p>No record found.</p>");
                }
            }
            else{
                echo("<p>Select Unsuccessful</p>");
            }
            mysqli_close($conn);
        }
        else {
            echo "<p>Connection Failed</p>";
        }
    ?>

    <!--Footer-->
    <?php
        include_once "footer.inc";
    ?>