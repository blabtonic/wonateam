<?php
 
class DataBaseItem {
    public function __construct($fields, $obj) {
        $this->fields = $fields;
        $this->obj = $obj;
    }
    public function printIt() {
        foreach ($this->fields as $field) {
            $val = $this->obj[$field];
            if (is_array($val)) {
                $val = implode(",", $val);
            }
            echo "$field is " . $val ."<br/>";
        }
    }
}
 
function printAll() {
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
            $item = new DatabaseItem(array("name", "jersey", "position"), $obj);
            $item->printIt();
        }
    }
    else {
        //if none of the products are found show this message
        echo "No products found \n";
    }
 
    //closes the connection to mongoDB
    $conn->close();
}
 
function insertPerson($obj) {
    // a new mongoDB connection	
    $conn = new MongoClient('localhost');
 
    //connect to a database Database name: roster
    $db = $conn->roster;
 
    //a new collection object db under collections: team
    $collection = $db->team;
 
    $collection->insert($obj);
 
    //closes the connection to mongoDB
    $conn->close();
}
 
function removePeople($obj) {
    // a new mongoDB connection	
    $conn = new MongoClient('localhost');
 
    //connect to a database Database name: roster
    $db = $conn->roster;
 
    //a new collection object db under collections: team
    $collection = $db->team;
 
    $collection->remove($obj);
 
    //closes the connection to mongoDB
    $conn->close();
}
 
 
echo "Printing before insert: <br />";
printAll();
 
insertPerson(
    array(
        'name' => "Bob", 
        'jersey' => 'Whatever', 
        'position' => array(
            'P'
        ) 
    )
);
 
echo "Printing after insert: <br />";
printAll();
 
removePeople(
    array(
        'name' => "Bob"
    )
);
 
 
echo "Printing after remove: <br />";
printAll();
?>
