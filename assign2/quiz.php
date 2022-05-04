<!-- This page is called "Quiz". It includes 5 questions related to the IoT that a user can answer using 5 unique input methods.
They also must input their details, and follow some input masks and validation rules. Upon finishing the quiz, they can submit their answers
to a web page. They can also clear their answers.-->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="UTF-8">
    <meta name="description" content="IoT Website">
    <meta name="keywords" content="HTML, CSS, IOT, Quiz">
    <meta name="author" content="IoT Club">
    <title>IoT Quiz</title>
    
    <!-- Imports-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body id="all_quiz">
    <!-- Code for the navigation bar -->
    <?php
        $page = "quiz";
        include_once ("header.inc");
    ?>
    
    <!-- class "div1" gives its contents an opaque grey background -->
    <div class="div1">
    <form method="post" action="http://mercury.swin.edu.au/it000000/formtest.php">

        <!-- Users enter their details here-->
        <h2 class="head2">Your Details:</h2>
        <fieldset>
            <p id="quiz_details">
                <label for="SDTNAME">Name</label>
                    <!-- Pattern ensures that input is in the alphabet, or is a hyphen or space. + allows for more than 1 character. -->
                    <input type = "text" name = "Name" id = "SDTNAME" required = "required" minlength = "1" maxlength = "30" pattern="[A-Za-z- ]+"/><br>
                <label for="SDTLNAME">Surname</label>
                    <input type = "text" name = "Surname" id = "SDTLNAME" required = "required" minlength = "1" maxlength = "30" pattern="[A-Za-z- ]+"/><br>
                <label for="SDTID">Student ID</label> 
                    <!-- Pattern allows only digits and either 7 or 10 long.-->
                    <input type = "text" name = "Student ID" id = "SDTID" required = "required" maxlength = "10" pattern="\d{7}|\d{10}"/>
            </p>
        </fieldset>
        <br>

        <!-- Quiz -->
        <h2 class="head2">Quiz:</h2>
        <!-- Drop down -->
        <fieldset>
            <legend><strong>Question 1</strong></legend>
            <p>
                <select name="coined" id="coined">
                    <option value="Gates">Bill Gates</option>			
                    <option value="Lewis">Peter Lewis</option>
                    <option value="Ashton">Kevin Ashton</option>
                    <option value="Weiser">Mark Weiser</option>
                </select>
                <label for="coined"> coined the term "Internet of Things".</label> 
            </p>
        </fieldset>
        
        <!-- Radio button -->
        <fieldset>
            <legend><strong>Question 2</strong></legend>
            <p>
                <label>Which of the following is <strong>not</strong> an IOT device?</label><br>
                <label><input type="radio" name="not_IOT_device" value="laptop">A laptop</label>
                <label><input type="radio" name="not_IOT_device" value="shark tag" required="required">Shark tag</label>
				<label><input type="radio" name="not_IOT_device" value="google home">Google Home</label>
				<label><input type="radio" name="not_IOT_device" value="smoke alarm">Nest smoke alarm</label>
            </p>
        </fieldset>
        
        <!-- Checkbox -->
        <fieldset>
            <legend><strong>Question 3</strong></legend>
            <p>
                <label>Which of the following is IoT built upon <strong>(Select all that apply)</strong></label><br>
                <!-- &nbsp; is used to create space between options.-->
                <label><input type="checkbox" name="built_on[]" value="RAID configurations" checked>RAID configurations &nbsp;</label>
                <label><input type="checkbox" name="built_on[]" value="Cloud computing">Cloud computing &nbsp;</label>
                <label><input type="checkbox" name="built_on[]" value="Data gathering sensors">Data gathering sensors &nbsp;</label>
                <label><input type="checkbox" name="built_on[]" value="Interconnected devices">Interconnected devices &nbsp;</label>
                <label><input type="checkbox" name="built_on[]" value="Smart fridges">Smart fridges</label>
            </p>
        </fieldset>

        <!-- Textbox -->
        <fieldset>
            <legend><strong>Question 4</strong></legend>
            <p>
                <label for ="answer">A</label>
                <input type = "text" name = "device" id = "answer" required = "required" minlength = "1" placeholder="????"/>
                <label for ="answer">is a device that detects external information and creates a signal recognisable by people or machines</label>
            </p>
        </fieldset>

        <!-- Custom input / Number slider -->
        <fieldset>
            <legend><strong>Question 5</strong></legend>
            <p>
                <label for = "slider">In 2019, there were an estimated average of 11 IOT devices per household. <br> What do you think this number is in 2022*?</label><br>
                <input type = "range" min = "1" max = "5" value = "3" class = "slider" id = "slider"><br>
                <label for = "slider">8 &nbsp; 11 &nbsp; 19 &nbsp; 25 &nbsp; 70</label><br>
                *Note that values are only estimates and vary based on source.
            </p>
        </fieldset>

        <input type= "submit" value="Submit"/>
		<input type= "reset" value="Reset Form"/>

    </form>
    </div>
<footer>
    <em>"The IoT Club" aims to provide the best possible information on the technology "Internet of Things".<br>
        Contact us:</em> <br>
    &copy; <a href="mailto=103802047@student.swin.edu.au">IoT Club Email</a>
</footer>
</body>
</html>
