<?php
class Pupil
{
    public $id;
    public $firstname;
    public $lastname;
    /**
     * @var Address
     */
    public $myAddress;

    /**
     * @param Address $inputAddress
     * @return void
     */
    public function setAddress($inputAddress){
        $this->myAddress=$inputAddress;
    }

    /**
     * @param string $name
     * @return void
     */
    public function __create($name){
        $this->firstname = $name;
    }

}
