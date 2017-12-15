<?php

include("DB.php");

class Booking_Object
{

    const SLOTS_PER_DAY = 8;
    const AVAILABLE_SLOTS = 2;

    public $hours = array( "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00");

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

    public function allBookingsPerDate($month, $day,$year)
    {
        $appointment_date = $month . "/" . $day . "/" . $year;
        $query = "SELECT * FROM appointments WHERE appointment_date = :appointment_date";
        $this->db->query($query);
        $this->db->bind("appointment_date", $appointment_date);
        $this->db->execute();
        return $this->db->resultSet();
    }

}
