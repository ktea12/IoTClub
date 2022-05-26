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
        $page = "index";
        include_once ("header.inc");
    ?>
        <!-- <header id="b">
            <img id="logo" src="images/iotlogo.png" alt="IoT Logo">
            <br>
            <h1 class="head1">Enhancement</h1>
        </header> -->
<div class="div1">   
    <section class="container-fluid px-100">
        <div class="row align-items-center content">
            <div class="col-md-5 order-2 order-md-1 blurb2">
                <img src="images/Bootstrap_logo.png" alt="Bootstrap">
              </div>
              <div class="col-md-7 text-center order-1 order-md-2">
                <div class="row justify-content-center">
                    <div class="blurb">
                        <!--<div class="col-10 col-lg-8 blurb mb-5 mb-md-0">-->
                        <h2>Bootstrap</h2>
                        <p>Bootstrap is a free and open-source for faster and easier web development framework.
                           With the basic knowledge of HTML and CSS, our team members are able to modify according to the requirement. Basically, we use Bootstrap which is a different domain that we have covered outside the class. We use the Bootstrap for the navigation bar. It is a fixed navigation bar. This means when we scroll down the navigation bar sticks on top of the window. We also use the enhancement of a collapsible bar, which collapses when we minimise the window. 
                        </p>
                        <p> When implementing the features, we have used many different types of classes. For example, we used "blurb" class. When we want to make some changes like the font size to the heading 2, we can simply categorized it as ".blurb h2".
                            This section will automatically change the size of the font in heading 2 within that particular class range like the word "Bootstrap" and "CSS".
                        </p>
                        <p>
                            Besides that, data-toggle and data-target attribute have been used in the button tag to instruct Bootstrap which element has to be selected and what to do with it. 
                        </p>
                        <p>
                             <a href="https://getbootstrap.com/docs/4.0/components/navbar/?msclkid=8c9050b0bace11ec8412286fb889541d" >Link 1 of the navigation bar</a><br>
                             <a href="https://www.w3schools.com/bootstrap/bootstrap_navbar.asp#:~:text=%20Bootstrap%20Navigation%20Bar%20%201%20Navigation%20Bars.,element%20and%20add%20an%20input%20%28s%29.%20More%20?msclkid=8c8f9d6cbace11ec9f50eccb4f4791f7">Link 2 of the navigation bar</a><br>
                             <a href="quiz.html">Quiz Page</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center content">
            <div class="col-md-6 blurb2">
                <img src="images/css.jpg" alt="CSS">
              </div>
            <div class="col-md-6 text-center">
                <div class="row justify-content-center">
                    <div class="blurb">
                        <!--<div class="col-10 col-lg-8 blurb mb-5 mb-md-0">-->
                        <h2>CSS</h2>
                        <p>Cascading Style Sheets(CSS) is implemented in the designed of the website for a way to define, apply, and manage sets of style characteristics. We use animation on the topic page in which can be seen in the IoT Benefits image so that it zooms in when we hover on it.
                           Besides that, we also put some related IoT images all across the Topic page and when we hover over it, each of the page will be zoom in. Our team members also had implement a transition from one page to another page.
                        </p>
                         <p>For the animation part in the images across the Topic page, we use ".box:hover", ".box" and ".box img" class. the ".box" width and the shadow of the box while the ".box img" is use for resizing the images. The hover part we use ".box:hover" which we insert the transform scale of the expansion when we hover it and also the cursor as a pointer.
                             We use different markups as such transform, transition value and display. 
                            Apart from that, we use keyframes for the making on the transition from another page to the Quiz page. 
                            We set the opacity from 0 to 1 and transform the text position.
                        </p>
                        <a href="https://www.freecodecamp.org/news/css-transition-examples/?msclkid=60c2c6c1baca11ec8fa480c24a07c48f">Link 1 of the transition</a><br>
                        <a href="https://www.w3schools.com/howto/howto_css_zoom_hover.asp?msclkid=60c11112baca11ec92e86143041e767f">Link 2 of the transition</a><br>
                       <a href="https://www.youtube.com/watch?v=7j8vTKx0ABA">Link to the Youtube channel about transition</a><br>
                       <a href="topic.html">Topic page</a>
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
<?php include_once "footer.inc"?>;
</body>
</html>