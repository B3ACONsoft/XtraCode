<?php
/*
 * JUST TO BE CLEAR.
 * WE WOULD BE USING HTTPS IN A LIVE APPLICATION.
 * HTTPS IS NO ENABLED ON THIS TEST SERVER.
 * CODE ON THIS PAGE WOULDN'T CANGE
 * MUCH/ANY IF IT WERE TO BE IMPLEMENTED.
 * 
 * ALSO.
 * SHOULD WE BE CONCERNED WITH HANDLING MULTIPLE REQUESTS?
 * LIKE USE CURL FOR EXAMPLE? IS THAT POSSIBLE?
 */


//is this a post request?
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//check the post array
	if(count($_POST)) {
		//validate data
	
		//switch on the command
	
		//parse command parameters if any
	
		//pass command to formatting script
	}
	
} else {
	//echo and http error
	//echo(http_response_code(404));
}

function sendOperationResult($_result)
{
	//send a HTTP response indicating operation result
}

?>