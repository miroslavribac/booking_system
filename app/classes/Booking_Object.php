<?php

class Booking_Object
{

    const MAX_APPOINTMENTS = 2;

    private $reg;
    private $firstName;
    private $lastName;
    private $email;
    private $address;
    private $bookingInfo = array();
    private $date;
    private $status;

    public function getReg()
    {
        return $this->reg;
    }
    public function setReg($reg)
    {
        $this->reg = $reg;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getBookingInfo()
    {
        return $this->bookingInfo;
    }
    public function setBookingInfo($name, $value)
    {
        $this->bookingInfo[$name] = $value;
        return $this;
    }

}
