<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=i491u20_jescourt', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events
 (name, start, end)
 VALUES (:title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>
