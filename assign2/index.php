<!--This is the first page of the website named as "Index". It gives the title to the website, a menu that links to other webpages and also provides a footer which gives our contact details.-->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="IoT Website">
    <meta name="keywords" content="HTML, CSS, IOT, Internet of Things">
    <meta name="author" content="IoT Club">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>IoT Main Menu</title>
</head>

<body>
    <?php
        $page = "index";
        include_once ("header.inc");
    ?>

<p id = "citation"><cite><b>“IoT will stump IT until clouds and big data come aboard.”</b></cite> — Stephen Lawson, EMC</p>
<hr /><br><br><br><br><br>
<div class="cont">
    <div class="center">
    <form style="display: inline" action="topic.php" method="get">
        <button class="btn txt1">INTERNET OF THINGS DESCRIPTION</button>
    </form><br><br>
    <form style="display: inline" action="quiz.php" method="get">
        <button class="btn txt1">INTERNET OF THINGS QUIZ</button>
    </form><br><br>
    <form style="display: inline" action="manage.php" method="get">
        <button class="btn txt1">MANAGER</button>
    </form><br><br><br><br>
    <form style="display: inline" action="enhancements.php" method="get">
        <button class="btn txt1">WEBSITE ENHANCEMENTS</button>
    </form><br><br>
    <form style="display: inline" action="phpenhancements.php" method="get">
        <button class="btn txt1">WEBSITE ENHANCEMENTS 2</button>
    </form><br><br><br><br>

    <button class="btn txt1"><a href="https://www.youtube.com/watch?v=sfbZnMBQch0">WEBSITE EXPLANATION VIDEO</a></button>
    
    </div>
</div>
<br><br><br><br><br>
<hr>
</body>
<?php include_once "footer.inc"?>;
</html>