<?php    $con = mysqli_connect("mysql.hostinger.com", "u983372861_user", "Lukasz1989!", "u983372861_data");        $username = $_POST["username"];    $sql = "SELECT * FROM user_result_diet_daily WHERE username='$username' ORDER BY date";    $result = mysqli_query($con, $sql);    $response = array();    $response1 = array();    while ($row = mysqli_fetch_array($result)) {        array_push($response, array("RESULT"=>$row[1], "date"=>$row[3]));    }    if ($stmt = mysqli_prepare($con, $sql)) {    	mysqli_stmt_execute($stmt);    	mysqli_stmt_store_result($stmt);    }    if (mysqli_stmt_num_rows($stmt) == 0) {    	$response1["noresult"] = true;    	echo json_encode($response1);    }    elseif (mysqli_stmt_num_rows($stmt) > 0) {		echo json_encode(array("server_response"=>$response));    }    	?>