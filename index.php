<?php
error_reporting (E_ALL & ~E_NOTICE);
try{
	require("main.php");
}
catch( MongoConnectionException $e ){
	//if there was an error we can catch and display the problem
	echo $e->getMessage();
}
catch( MongoException $e )
{
	echo $e->getMessage();
}
?>
