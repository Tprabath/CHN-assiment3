<?php

include "connection.php";

// valided
if (empty($_POST["user"]) || empty($_POST["pwd"])) {
    $alert_type = "alert";
    $massage = "Please Enter your user name & password";

} else {

    // login details.
    $userName = $_POST["user"];
    $password = $_POST["pwd"];

    $search_user = " SELECT * FROM `user` WHERE `username` = '" . $userName . "' AND `password` = '" . $password . "' ";
    $result = $conn->query($search_user);

    $details = $result->fetch_assoc();

    if ( $result->num_rows > 0 && $details['status']) {
        $alert_type = "success";
        $massage = "Loging Success ✅";

    } else {
        $alert_type = "alert";
        $massage = "Loging Faild. ❌";
    }
}

echo json_encode([
    "alert_type" => $alert_type,
    "msg" => $massage
]);

?>
