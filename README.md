wonateam
========
Simple PHP connecter to a mongoDB database 

What I have done here is create a connection to a mongoDB database using PHP 

The database must have the fields: name, jersey and position for it to work properly. Name is a sting value, jersey is and decimal value and position is an array with sting in there which is the reason why I used the implode method once PHP does detect the required fields it then displays them in a list 

ex
========
Name: Randy Egbert <br>
Jersey: 44 <br>
Position: Catcher, First Base
