<?php

$connect = new PDO('mysql:host=localhost;dbname=i491u20_jescourt', 'root', '');
$data = array();
$query = "SELECT * FROM events ORDER BY id";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row) {
    $data[] = array(
        'id' => $row["id"],
        'title' => $row["title"],
        'start' => $row["start"],
        'end' => $row["end"]
    );
}

//JSON data feed back to calendar.php
echo json_encode($data);

?>
