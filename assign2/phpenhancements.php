<!---This is the fourth page of the website named as "Enhancements". There have a list of enhancements applied on other pages like animations, transitions and bootstrap which have been mentioned in detail here.-->

<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="styles/enhancements.css">
 <link rel="stylesheet" href="styles/style.css">
 <meta charset="UTF-8">
 <meta name="description" content="IoT Website">
 <meta name="keywords" content="HTML, CSS, Enhancements, IOT">
 <meta name="author" content="IoT Club">
 <title>Website Enhancements</title>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <!-- Had to delete this for it to work. heres the code though:
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    -->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="app.css">

    <!-- Navigation bar-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>

<body>
    <?php
        $page = "enhancements";
        include_once ("header.inc");
    ?>
<div class="div1">   
    <section class="container-fluid px-100">
        <div class="row align-items-center content">
            <div class="col-md-5 order-2 order-md-1 blurb2">
                <img src="images/login.png" alt="Login">
              </div>
              <div class="col-md-7 text-center order-1 order-md-2">
                <div class="row justify-content-center">
                    <div class="blurb">
                        <!--<div class="col-10 col-lg-8 blurb mb-5 mb-md-0">-->
                        <h2>Login Feature</h2>
                        <p>In the manage.php, we applied a login feature in our website using PHP and MySQL. The login feature is very simple and easy to use. The user can login using their username and password.</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center content">
            <div class="col-md-6 blurb2">
                <img src="images/database.jpg" alt="Database">
              </div>
            <div class="col-md-6 text-center">
                <div class="row justify-content-center">
                    <div class="blurb">
                        <!--<div class="col-10 col-lg-8 blurb mb-5 mb-md-0">-->
                        <h2>Database</h2>
                        <p>Primary key

                            A field in the table that uniquely identify each row/record in a databse table.
                            In our StudentInfo's table, we used StudentID as the primary key and for 
                            the Attempts table we used AttemptID as the primary key. 
                        </p>
                         <p>Foreign Key

                            When it comes to the foreign key, it is a unique field in one table that refers 
                            to the primary key of another table. In our table, 
                            we basically inner join StudentID as the foreign key in the Attempts's table. 

                        </p>

                        <p>We normalized the table into 2. Which consists of Attempts's table and StudenInfo table.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id = "a">
            <a href="https://www.youtube.com/watch?v=SsadMqIH7go&t=4s">Website explanation video</a>
        </div>
    </section>
</div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <script>
        $(function () {
            $(document).scroll(function () {
                var $nav = $("#mainNavbar");
                $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
            });
        });
    </script>
    <?php
        include_once "footer.inc"?>;
</body>
</html>