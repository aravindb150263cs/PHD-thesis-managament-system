<?php      

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$dbName = "deanproject";
mysqli_select_db($conn,$dbName); /*added semi-colon*/
$result_t = mysqli_query($conn,"SHOW TABLES");
while($row = mysqli_fetch_assoc($result_t))
{
   mysqli_query($conn,"TRUNCATE " . $row['Tables_in_' . $dbName]);
}
?>
