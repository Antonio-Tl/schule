<?php
class Address
{
    public $zip; // int??? 01317 PLZ berlin - int mit führenden Nullen?? dann
    public $city;
    public $nr; // int nr ?? Hausnumer 16 C ist kein Int?  Hausnummer 3-5 ist kein int!
    public $street;

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    } // generate setters and getters pls

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    } // generate setters and getters pls





    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

}