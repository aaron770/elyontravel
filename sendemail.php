<?php
	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Thank you for contacting us. We will contact you as early as possible.'
	);
	//print phpinfo(); 
	error_reporting(-1);
ini_set('display_errors', 'On');
//set_error_handler("var_dump");
$body ="";
$email;
$subject;
$email_from;
$email_to = 'Sales@ElyonTravel.com';
if (!empty($_REQUEST)) {
	//$body;
	foreach($_REQUEST as $key => $val) {
		if (isset($_REQUEST[$key]) && !empty($_REQUEST[$key])) {
			$body .= "'". $key .":  '" . "'" . $val . "'\n\n";
		}
		
	}
$email = isset($_REQUEST['email']) ? trim(stripslashes($_REQUEST['email'])) : "NA";
$subject = isset($_REQUEST['subject']) ? trim(stripslashes($_REQUEST['subject'])) : "NA";
	$body .= ";";
	$email_from = $email;
    //$email_to = 'Sales@ElyonTravel.com';// your email
    //$body;
}
    $success = mail($email_to, $subject, $body, 'From: <'.$email_from.'>');
	$status['body'] = $body;
    echo json_encode($status);
//}
    die;

/*
if (!empty($_POST) || !empty($_GET)) {
		# code...
	
    $from = isset($_POST['from_city']) ? trim(stripslashes($_POST['from_city'])) : trim(stripslashes($_GET['from_city'])) ? trim(stripslashes($_GET['from_city']))  : "NA";
    $to = isset($_POST['to_city']) ? trim(stripslashes($_POST['to_city'])) :  trim(stripslashes($_GET['to_city']))? trim(stripslashes($_GET['to_city']))  : "NA";
    $ticket_type = isset($_POST['ticket_type']) ? trim(stripslashes($_POST['ticket_type'])) : trim(stripslashes($_GET['ticket_type']))? trim(stripslashes($_GET['ticket_type']))  : "NA";
    $depart = isset($_POST['depart']) ? trim(stripslashes($_POST['depart'])) : trim(stripslashes($_GET['depart']))? trim(stripslashes($_GET['depart']))  : "NA";
    $return = isset($_POST['return']) ? trim(stripslashes($_POST['return'])) : trim(stripslashes($_GET['return'])) ? trim(stripslashes($_GET['return']))  : "NA";
    $nonstop = isset($_POST['nonstop']) ? trim(stripslashes($_POST['nonstop']))  : trim(stripslashes($_GET['nonstop'])) ? trim(stripslashes($_GET['nonstop']))  : "NA";
    $flexible = isset($_POST['flexible']) ? trim(stripslashes($_POST['flexible'])) : trim(stripslashes($_GET['flexible'])) ? trim(stripslashes($_GET['flexible']))  : "NA";
    $class = isset($_POST['class']) ? trim(stripslashes($_POST['class'])) :  trim(stripslashes($_GET['class'])) ? trim(stripslashes($_GET['eclass']))  : "NA";;
    $passengers = isset($_POST['passengers']) ? trim(stripslashes($_POST['passengers'])) : trim(stripslashes($_GET['passengers'])) ? trim(stripslashes($_GET['passengers']))  : "NA";
    $name;
    if (isset($_POST['fname']) || isset($_GET['fname'])) {
    	$name = isset($_POST['fname']) && isset($_POST['lname'])? trim(stripslashes($_POST['fname'])) . " " . trim(stripslashes($_POST['fname'])) : trim(stripslashes($_GET['fname'])) . " " . trim(stripslashes($_GET['fname'])) ? trim(stripslashes($_GET['fname'])) . " " . trim(stripslashes($_GET['fname']))  : "NA";
    } else {
    	$name =isset($_POST['name']) ? trim(stripslashes($_POST['name'])) :  trim(stripslashes($_GET['name'])) ? trim(stripslashes($_GET['name']))  : "NA";
    }
    $company = isset($_POST['company']) ? trim(stripslashes($_POST['company'])) : trim(stripslashes($_GET['company'])) ? trim(stripslashes($_GET['company']))  : "NA"; 
    $email = isset($_POST['email']) ? trim(stripslashes($_POST['email'])) : trim(stripslashes($_GET['email'])) ? trim(stripslashes($_GET['email']))  : "NA"; 
    $subject = isset($_POST['subject']) ? trim(stripslashes($_POST['subject'])) : trim(stripslashes($_GET['subject'])) ? trim(stripslashes($_GET['subject']))  : "NA"; 
    $message = isset($_POST['message']) ? trim(stripslashes($_POST['message'])) : trim(stripslashes($_GET['message'])) ? trim(stripslashes($_GET['message']))  : "NA"; 
     
     $phone = isset($_POST['phone']) ? trim(stripslashes($_POST['phone'])) : trim(stripslashes($_GET['phone'])) ? trim(stripslashes($_GET['phone']))  : "NA";
     $referred =  isset($_POST['referred']) ? trim(stripslashes($_POST['referred'])) : trim(stripslashes($_GET['referred'])) ? trim(stripslashes($_GET['referred']))  : "NA";
     //$subject  = isset($_POST['subject']) ? trim(stripslashes($_POST['subject'])) : trim(stripslashes($_GET['subject']));
     //$message = isset($_POST['message']) ? trim(stripslashes($_POST['message'])) : trim(stripslashes($_GET['message']));
    $email_from = $email;
    $email_to = 'Sales@ElyonTravel.com';// your email
    $body;
if ((isset($_POST['location']) && $_POST['location'] == "services.html") || (isset($_GET['location']) && $_GET['location'] == "services.html")) {
	 $body ='From: ' . $from . "\n\n" . 'to: ' . $to . "\n\n" . 'Ticket type: ' . $ticket_type . "\n\n" . 'Depart date: '  .$depart . "\n\n" .'Return date: ' . $return . "\n\n" .'Class: ' . $class ."\n\n" .'Passengeres: '  .$passengers ."\n\n" .
     'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;
} else if((isset($_POST['location']) && $_POST['location'] == "contact-us.html") || (isset($_GET['location']) && $_GET['location'] == "contact-us.html")){
	//dataString ='location=' + theLocation +'&name='+ name + '&email=' + email + '&phone=' + phone + '&company=' + company + '&subject=' + subject + '&message=' + message;
	$body ='From: ' . $name . "\n\n" . 'email: ' . $email . "\n\n" . 'phone: ' . $phone . "\n\n" . 'company: '  .$company . "\n\n" .'subject: ' . $subject . "\n\n" .'message: ' . $message . "\n\n";
}
  */
 //   $success = mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

 //   echo json_encode($status .$body);
//}
   // die;