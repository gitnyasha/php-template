<?php

use App\libraries\Database;

class Company {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCompany() {
        $this->db->query("SELECT * FROM company");

        $result = $this->db->resultSet();
        return $result;
    }

    public function updateCompany($name, $address, $phone, $email, $bank) {
        $this->db->query("UPDATE `company` SET `name`='$name',`address`='$address',`phone`='$phone',`email`='$email',`bank`='$bank' WHERE id=(SELECT max(id) FROM company)");

        if ($this->db->execute()) {
           return true;
        } else {
            return false;
        }
    }

    public function updateCompanyLogo($location) {
        $this->db->query("UPDATE `company` SET `image_path`='$location' WHERE id=(SELECT max(id) FROM company)");
        if ($this->db->execute()) {
           return true;
        } else {
            return false;
        }
    }

}
