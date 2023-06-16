<?php 
class User {
    public $id;
    public $name;
    public $username;
    public $email;
    public $address;
    public $phone;
    public $website;
    public $company;

    public function __construct($id,$name, $username, $email, $address, $phone, $company) {
        $this->id= $id;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->company = $company;
    }
    

    public function getName() {
        return $this->name;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getStreet() {
        return $this->address['street'];
    }

    public function getCity() {
        return $this->address['city'];
    }

    public function getZipcode() {
        return $this->address['zipcode'];
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getCompanyName() {
        return $this->company['name'];
    }

    public function getFullAddress() {
        return $this->getStreet() . ', ' . $this->getCity() . ', ' . $this->getZipcode();
    }
}