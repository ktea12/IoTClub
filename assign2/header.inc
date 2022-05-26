<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>                        
            	</button>
            	<p class="navbar-brand">Internet of Things</p>
        	</div>
        		<div class="collapse navbar-collapse" id="myNavbar">
            	<ul class="nav navbar-nav">
            	<li class="dropdown">
			<?php
			if ($page == "index")
				$class = "active";
			else
				$class = "";
			?>
            	<li class = '<?php echo $class;  ?>'><a href="index.php">Index</a></li>
			
			<?php
			if ($page == "topic")
				$class2 = "active";
			else
				$class2 = "";
			?>
            	<li class = '<?php echo $class2; ?>'><a href="topic.php">Topic</a></li>

			<?php
			if ($page == "quiz" or $page == "feedback_page")
				$class3 = "active";
			else
				$class3 = "";
			?>
            	<li class = '<?php echo $class3; ?>'><a href="quiz.php">Quiz</a></li>

			<?php
			if ($page == "manage")
				$class6 = "active";
			else
				$class6 = "";
			?>
            	<li class = '<?php echo $class6; ?>'><a href="manage.php">Manager</a></li>
            	</ul>

            	<ul class="nav navbar-nav navbar-right">
			<?php
			if ($page == "enhancements")
				$class4 = "active";
			else
				$class4 = "";
			?>
            	<li class = '<?php echo $class4; ?>'><a href="enhancements.php"><span class="glyphicon glyphicon-info-sign"></span> Enhancements</a></li>
            	
			
			<?php
			if ($page == "enhancements2")
				$class5 = "active";
			else
				$class5 = "";
			?>
			<li class = '<?php echo $class5; ?>'><a href="enhancements2.php"><span class="glyphicon glyphicon-info-sign"></span> Enhancements 2</a></li>
			</ul>
        	</div>
        </div>
</nav>

<header id="all_quiz">
	<img id="logo" src="images/iotlogo.png" alt="IoT Logo">
      <br>
	<?php
		if ($page == "index")
      		echo "<h1 class='head1'>Internet <sup>of</sup> Things</h1>";
		elseif ($page == "topic")
			echo "<h1 class='head1'>INTRODUCTION TO IoT</h1>";
		elseif ($page == "quiz")
			echo "<h1 class='head1'>Quiz</h1>";
		elseif ($page == "feedback_page")
			echo "<h1 class='head1'>Quiz Feedback</h1>";	
		elseif ($page == "enhancements")
			echo "<h1 class='head1'>Enhancements</h1>";
		elseif ($page == "enhancements2")
			echo "<h1 class='head1'>Enhancements 2</h1>";
		else
			echo "<h1 class='head1'>Manager</h1>";
			
	?>
</header>