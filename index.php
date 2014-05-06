<?php
error_reporting (E_ALL & ~E_NOTICE);
try{
	// a new mongoDB connection	
	$conn = new MongoClient('localhost');
	
	//connect to a database Database name: roster
	$db = $conn->roster;
	
	//a new collection object db under collections: team
	$collection = $db->team;
	
	//fetches all documents
	$cursor = $collection->find();
	
	//How many results found
	$num_docs = $cursor->count();
	
	if ($num_docs > 0) {
		//loop over the results
		foreach ($cursor as $obj) {
			echo "Name: ". $obj["name"]. "<br/>";
			echo "Jersey ". $obj["jersey"]. "<br/>";
			echo "Position ". implode(",", $obj["position"]). "<br/>"; //implode functions uses the "," to use as seperators then echos the string in the array 
			echo "<br/>";
		}
	}
	else {
		//if none of the products are found show this message
		echo "No products found \n";
	}
	//closes the connection to mongoDB
	$conn->close();
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
