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
			if ($page == "quiz")
				$class3 = "active";
			else
				$class3 = "";
			?>
            	<li class = '<?php echo $class3; ?>'><a href="quiz.php">Quiz</a></li>
            	</ul>

            	<ul class="nav navbar-nav navbar-right">
			<?php
			if ($page == "enhancements")
				$class4 = "active";
			else
				$class4 = "";
			?>
            	<li class = '<?php echo $class4; ?>'><a href="enhancements.php"><span class="glyphicon glyphicon-info-sign"></span> Enhancements</a></li>
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
		else
			echo "<h1 class='head1'>Enhancement</h1>";
			
	?>
</header>