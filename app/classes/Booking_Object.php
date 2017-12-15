<?php

include("DB.php");

class Booking_Object
{

    const SLOTS_PER_DAY = 8;
    const AVAILABLE_SLOTS = 2;

    private $reg;
    private $firstName;
    private $lastName;
    private $email;
    private $address;
    private $bookingInfo = array();
    private $date;
    private $time_slot;
    private $status;

    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function timeSlotsPerDate($month, $day,$year)
    {
        $time_slots = [];
        $appointment_date = $month . "/" . $day . "/" . $year;
        $query = "SELECT * FROM appointments WHERE appointment_date = :appointment_date";
        $this->db->query($query);
        $this->db->bind("appointment_date", $appointment_date);
        $this->db->execute();
        $result = $this->db->resultSet();
        foreach($result as $booking){
            $time_slots[] = $booking["time_slot"];
        }

        return $time_slots;
    }

}
