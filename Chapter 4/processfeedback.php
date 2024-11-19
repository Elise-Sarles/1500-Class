<?php 
//Create short variable names
$name =$_POST['name'];
$email=$_POST['email'];
$feedback= $_POST['feedback'];

//set up some static infomation
$toaddress = "feedback@example.com";
$subject = "Feedback from Web site";
$mailcontent = "Customer Name: ".filter_var($name)."\n".
                "Custimer Email: ".$email."\n".
                "CUstomer Comments: \n".$feedback."\n";

$fromaddress = "From: webserver@example.com\r\n".
                "Reply-To: bob@example.com";
mail($toaddress, $subject, $mailcontent, $fromaddress);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bob's Auto Parts - Feedback Submitted</title>
    </head>
    <body>
        <h1>Feedback submitted</h1>
        <p>Your feedback has been sent.</p>
    </body>
</html>