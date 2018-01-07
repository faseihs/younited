<?php
include_once("pdo_database.php");
$stmt = $dbCon->prepare("SELECT * FROM views");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json_data=new stdClass();
foreach ($results as $entry)
{
    $json_data->$entry['page_name']=$entry['views'];
}

var_dump($json_data);

file_put_contents("files/no_of_views.json",json_encode($json_data));

?>