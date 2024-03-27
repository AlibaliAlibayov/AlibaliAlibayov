<?php
$today = date("Y-m-d");
$dateArray = [];

for ($i = 0; $i < 7; $i++) {
    $date = date("Y-m-d", strtotime("-$i days", strtotime($today)));
    $dateArray[] = $date;
}

$dateArray = array_reverse($dateArray);

$connection = mysqli_connect("db4free.net", "admin_alibali", "atv8F@Hwd7V88V$", "robocean_demo");
if (!$connection){
    die("Connection failed: " . mysqli_connect_error());
}

$notAcceptedArray = $workingOnArray = $finishedArray = [];

foreach ($dateArray as $day) {
    $queries = [
        "SELECT COUNT(*) AS count FROM EspInfo WHERE DATE(comingdate) = ?",
        "SELECT COUNT(*) AS count FROM EspInfo WHERE DATE(acceptedtime) = ?",
        "SELECT COUNT(*) AS count FROM EspInfo WHERE DATE(finishedtime) = ?"
    ];

    foreach ($queries as $query) {
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "s", $day);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $count = mysqli_fetch_assoc($result)['count'];
        mysqli_stmt_close($stmt);

        if ($query === $queries[0]) $notAcceptedArray[] = $count;
        elseif ($query === $queries[1]) $workingOnArray[] = $count;
        elseif ($query === $queries[2]) $finishedArray[] = $count;
    }
}

$query = "SELECT COUNT(*) AS count FROM EspInfo WHERE status = 'finished'";
$result = mysqli_query($connection, $query);

$row = mysqli_fetch_assoc($result);
$countAll = $row['count'];

mysqli_close($connection);

$dataArray = ["not"=> $notAcceptedArray,"work" => $workingOnArray,"finish" => $finishedArray, "allcomplete" => $countAll];
$dataJSON = json_encode($dataArray);
header('Content-Type: application/json');
echo json_encode($dataJSON);
exit;
?>