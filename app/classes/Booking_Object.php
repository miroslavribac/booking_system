<?php

class Booking_Object
{

    const MAX_APPOINTMENTS_PER_HOUR = 2;
    const MAX_APPOINTMENTS_PER_DAY =  8;
    const APPOINTMENTS_DAY = 4;

    private $reg;
    private $firstName;
    private $lastName;
    private $email;
    private $address;
    private $bookingInfo = array();
    private $date;
    private $status;

    public function __construct()
    {

    }

}
