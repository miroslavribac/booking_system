<?php

include("DB.php");

storeBookingObject($_POST);

function storeBookingObject($post){

    $reg_number = $post['registration-number'];
    $date = $post["date"];
    $first_name = $post["first-name"];
    $last_name  = $post['last-name'];
    $email = $post['email'];
    $address = $post['address'];
    $person_or_company = $post["company"] ? "company" : "person";
    $time_slot = date("H:i:s");
    echo json_encode(array("person_or_company" => $person_or_company, "time_slot" => $time_slot));
//    echo $reg_number . "" . $date . " " . $first_name . " " . $last_name . " " . $email . " " . $address . " " . $person_or_company;

}

