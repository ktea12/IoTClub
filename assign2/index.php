<!--This is the first page of the website named as "Index". It gives the title to the website, a menu that links to other webpages and also provides a footer which gives our contact details.-->



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="UTF-8">
    <meta name="description" content="IoT Website">
    <meta name="keywords" content="HTML, CSS, IOT, Internet of Things">
    <meta name="author" content="IoT Club">
    <title>IoT Main Menu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <?php
        include_once "header.inc"
    ?>

<p id = "citation"><cite><b>“IoT will stump IT until clouds and big data come aboard.”</b></cite> — Stephen Lawson, EMC</p>
<hr /><br>
<div class="cont">
    <div class="center">
    <form style="display: inline" action="topic.html" method="get">
        <button class="btn txt1">INTERNET OF THINGS DESCRIPTION</button>
    </form><br><br>
    <form style="display: inline" action="quiz.html" method="get">
        <button class="btn txt1">INTERNET OF THINGS QUIZ</button>
    </form><br><br>
    <form style="display: inline" action="enhancements.html" method="get">
        <button class="btn txt1">WEBSITE ENHANCEMENTS</button>
    </form><br><br>
    </div>
</div>
<hr>
<br><br><br><br><br><br><br>
    <footer>    
    <em>"The IoT Club" aims to provide the best possible information on the technology "Internet of Things".<br>
        Contact us:</em> <br>
    &copy; <a href="mailto=103802047@student.swin.edu.au"><em>IoT Club Email</em></a>
    </footer>
  </body>
</html>