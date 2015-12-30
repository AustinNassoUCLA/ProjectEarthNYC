<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Project Earth - Contact Us!</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="cart.js"></script>
<link rel="stylesheet" type="text/css" href="main.css" />  
</head>
<body>

<?php include 'navbar.php' ?>

<div id="bg" style="position: relative; height: 500px; background-image:url(images/Store/photo%202.jpg)">
<br />
<br />
<div class="container_box" style="height: 320px; top: 70px; background-color: rgba(0,0,0,0.9)">
<h1 style="color: white;"> Project Earth, Inc. </h1>
<p class="body_text" style="text-align: center;">
Project Earth Incorporated<br />
3553 32nd Street, Long Island City, NY 11106<br />
Tel: 718-204-2161<br />
Email: c.eichner@projectearthnyc.com<br />
</p>
</div>
</div>

<div class="content_box" id="darksect">
<div class="container_box">
<?php 
$err1 = "";
$err2 = "";
$err3 = "";
$err4 = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
$email_from = $_POST['email']; // required
$email_valid = preg_match($email_exp,$email_from);
if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['feedback']) || empty($_POST['email']) || !$email_valid)
{
	if (isset($_POST['firstname']))
	{
	if(!$email_valid)
    	$err3 .= '       Enter valid email address.';
		
	if (empty($_POST['firstname']))
		$err1 = "      *Required field.";
		
	if (empty($_POST['lastname']))
		$err2 = "      *Required field.";
		
	if (empty($_POST['email']))
		$err3 = "      *Required field.";
		
	if (empty($_POST['feedback']))
		$err4 = '</br> <p class="req_field">'."      *Required field.".'</p>';
	}
	?>
<h1> We'd love to hear from you </h1>
<div class="form_container" style="display: block; margin: auto; width: 450px; text-align:left;">
<form class="body_text" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
Email: <input type="text" name="email"><p class="req_field"><?php echo $err3?></p></br></br>
First name: <input type="text" name="firstname"><p class="req_field"><?php echo $err1?></p></br></br>
Last name: <input type="text" name="lastname"><p class="req_field"><?php echo $err2?></p></br></br>
How was your experience with Project Earth?<?php echo $err4; ?></br><textarea name="feedback" rows="5" cols="60"></textarea>
<INPUT type="submit" value="Send"><INPUT type="reset">
</form>
</div>

<?php 
}

else
{	  

function clean_string($string) {
      	$bad = array("content-type","bcc:","to:","cc:","href");
      	return str_replace($bad,"",$string);
	  }
	  
    $first_name = $_POST['firstname']; // required
    $last_name = $_POST['lastname']; // required
    $comments = $_POST['feedback']; // required
	$email_to = "c.eichner@projectearthnyc.com";
    $email_subject = "Someone sent feedback.";
	$email_message = ""; 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Feedback: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '."c.eichner@projectearthnyc.com"."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);
echo '</br></br></br></br></br></br></br></br></br><h2 style="font-size: 60px;">Thanks for submitting!</h2>';

}

?> 
</div>
</div>



<div class="footer"> 
<div id="nav_bottom" class="navigation">
<div style="width:80%; margin: auto;">
    	<h3 style="color:white; float: left; display: inline-block;"> Project Earth Inc. © 2014 </h3>
        <h3 style="color:white; float: right; display: inline-block;">info@projectearthnyc.com</h3>
        </div>
    </div>
</div>
</body>