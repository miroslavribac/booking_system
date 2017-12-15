<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

//include("DB.php");
include("Calendar.php");

if(isset($_POST["data"])){

    $calendar = new Calendar();

    echo $calendar->show();

}



//storeBookingObject($_POST);
//
//function storeBookingObject($post){
//
//    $reg_number = isset($post['registration-number']) ? $post['registration-number'] : "";
//    $date = isset($post["date"]) ? $post["date"] : "";
//    $first_name = isset($post["first-name"]) ? $post["first-name"] : "";
//    $last_name  = isset($post['last-name']) ? $post['last-name'] : "";
//    $email = isset($post['email']) ? $post['email'] : "";
//    $address = isset($post['address']) ? $post['address'] : "";
//    $person_or_company = isset($post["company"]) ? "company" : "person";
//    $your_location_or_service = isset($post['your-location']) ? "your-location": "service";
//    $custom_location = isset($post['custom-location']) ? $post['custom-location'] : "";
//    $time_slot = date("H:i:s");
//
//    $booking_info = array(
//        "person_or_company" => $person_or_company,
//        "location_or_service" => $your_location_or_service,
//        "custom_location" => $custom_location,
//        "time_slot" => $time_slot
//    );
//
//    $booking_info = json_encode($booking_info);
//
//    $db = new DB();
//    $query = "INSERT INTO appointments(reg_number, first_name, last_name, email, address, booking_info, appointment_date, time_slot) VALUES(:reg_number, :first_name, :last_name, :email, :address, :booking_info, :appointment_date, :time_slot)";
//    $db->query($query);
//    $db->bind(":reg_number", $reg_number);
//    $db->bind(":first_name", $first_name);
//    $db->bind(":last_name", $last_name);
//    $db->bind(":email", $email);
//    $db->bind(":address", $address);
//    $db->bind(":booking_info", $booking_info);
//    $db->bind(":appointment_date", $date);
//    $db->bind(":time_slot", $time_slot);
//    $db->execute();
//
//}

