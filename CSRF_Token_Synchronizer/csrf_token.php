<?php

class csrf_token
{

	public static function check_csrf_token($csrf_token,$session_identifier)
	{
	
		echo "<script>alert('$session_identifier');</script>";
		
		$csrf_file = fopen("csrf_token.txt", "r") or die("Unable to open file containing csrf token");
		list($token,$session_id) = explode(",",chop(fgets($csrf_file)),2);
		fclose($csrf_file);
		if($token == $csrf_token)
		{
			if($session_identifier == $session_id )
			{
				return true;
			}
		}
	}
	
}

?>