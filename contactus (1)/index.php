<html>
	<head>
		<title>Build Internet! | Form validation using PHP</title>
		<style type="text/css">
			*{
			    padding:0px;
			    margin:0px;
			}
			body{
			    text-align:left;
			    font:12px "Lucida Grande",Arial,sans-serif;

			}
			#content{
			    width:450px;
			    text-align:left;
			    margin:10px;
			}
			.formitem{
			    width:100%;
			    padding: 6px;
			    font:12px "Lucida Grande",Arial,sans-serif;
			}
			h2{
			    font:18px "Helvetica",Arial,sans-serif;
			}
			.box{
			    width:100%;
			    padding:10px 0px 10px 5px;
			    margin-bottom: 8px;
			    font-weight:bold;
			}
			.green{
			    background-color:#95ca78;
			    border-bottom:solid 1px #8AA000;
			}
			.red{
			    background-color:#FDCBCA;
			    border-bottom:solid 1px #E8514A;
			}
		</style>
	</head>

	<body>
		<div id="content">

		<?php
		//If form was submitted
		if ($_POST['submitted']==1) {
	    	$to = "2joedeep@gmail.com"; //If title was entered
		    $errormsg = ""; //Initialize errors
	    	$subject = $_POST[subject]; //If title was entered
		    if ($_POST[yourname]){
		    	$yourname = $_POST[yourname]; //If title was entered
		    }
		    else{
		    	$errormsg = "Please enter Your Name";
		    }
		    if ($_POST[email]){
		    	$email = $_POST[email]; //If comment was entered
		    }
		    else {
		    	if ($errormsg){ //If there is already an error, add next error
		    		$errormsg = $errormsg . " & content";
		    	}else{
		    		$errormsg = "Please enter Your Email";
		    	}
        }
		    if ($_POST[textentry]){
		    	$textentry = $_POST[textentry]; //If comment was entered
		    }
		    else{
		    	if ($errormsg){ //If there is already an error, add next error
		    		$errormsg = $errormsg . " & content";
		    	}else{
		    		$errormsg = "Please enter Message";
		    	}
		    }
		}

		if ($errormsg){ //If any errors display them
    		echo "<div class=\"box red\">$errormsg</div>";
		}

		//If all fields present
		if ($yourname && $email && $textentry){
		    $headers = "From: $email";
		    $message = "From : " . $yourname . "\n Subject : " . $subject . "\n Message : \n " . $textentry; 
        $sent = mail($to, $subject, $message, $headers) ; 
        if ($sent) 
        		echo "<div class=\"box green\">Message Submitted successfully, Thank You!</div>";
        else 
        		echo "<div class=\"box red\">We encountered an error sending your mail</div>";
		}
		?>

			<!--Display post form-->
			<form action="index.php" method="POST" enctype="multipart/form-data">
			    <h2>Your Name (required)</h2>
			    <input class="formitem" type="text" name="yourname"/>
			    <br/>
			    <h2>Your Email (required)</h2>
			    <input class="formitem" type="text" name="email"/>
			    <br/>
			    <h2>Subject</h2>
			    <input class="formitem" type="text" name="subject"/>
			    <br/>
			    <h2>Message (required)</h2>
			    <textarea class="formitem" name ="textentry" rows="11"></textarea>
			    <input type="hidden" name="submitted" value="1">
			    <br/>
			    <input type="submit" value="Submit"/>
			</form>

		</div>
	</body>
</html>

