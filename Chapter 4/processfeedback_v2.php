<?php 
//Create short variable names
$name =$_POST['name'];
$email=$_POST['email'];
$feedback= $_POST['feedback'];

if(strlen($email < 6){
    echo 'That email address is not valid.'
    exit;
}

//set up some static infomation

$email_array = explode('@', $email);

$toaddress = "feedback@example.com";

if(strstr($feedback, 'shop')){
    $toaddress = "retail@example.com";
}else if(strstr($feedback, 'delivery')){
    $toaddress = "fulfilment@example.com";
}else if(strstr($feedback, 'bill')){
    $toaddress = "accounts@example.com";
}
else if ( email_arrray[1] == "bigcustomer.com"){
    $toaddress = "bob@example.com";
}

$new_email = implode('@', $email_array);

$subject = "Feedback from Web site";
$mailcontent = "Customer Name: ".str_replace("\r\n", "", $name)."\n".
                "Custimer Email: ".str_replace("\r\n", "", $email)."\n".
                "CUstomer Comments: \n".str_replace("\r\n", "", $feedback)."\n";

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
        <p>Your feedback (shown below) has been sent.</p>
        <p><?php echo nl2br(htmlspecialchars($feedback)); ?></p>
    </body>
</html>