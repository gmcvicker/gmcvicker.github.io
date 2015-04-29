<?php 
	
	if ($_POST["inputname"] == "")
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Name fields are empty!'));
		die($output);
	}
	elseif ($_POST["inputemail"] == "")
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Email fields are empty!'));
		die($output);
	}
	elseif ($_POST["inputevents"] == "")
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Events fields are empty!'));
		die($output);
	}
	else
	{
		$email_to 			=   'rsvp@grahamandrenee.com'; 
		$contact_name     	=   $_POST['inputname'];  
		$contact_email    	=   $_POST['inputemail'];
		$contact_events_string = implode(", ", $contact_events);
		$contact_message  	=   $_POST['inputmessage'];
	
    	$headers  	= "From: ".$contact_email."\r\n";	
		$headers   .= "Reply-To: ".$contact_email."\r\n";	
		$subject 	= "RSVP message from ".$contact_name;		
		
		$finalmessage = "$contact_message \n\n";

    	if(mail($email_to, $subject, $finalmessage, $headers)){
        	$output = json_encode(array('type'=>'success', 'text' => 'Message Sent'));
    	}else{
        	$output = json_encode(array('type'=>'error', 'text' => 'Failed'));
   		}		
		die($output);
	}
?>