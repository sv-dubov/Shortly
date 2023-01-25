<?php

include_once('config/database.php');

class Link
{
    private $urlTable = "urls";
    private $con;

    function __construct()
    {
        $database = new Database();
        $this->con = $database->connect();
    }

    public function insertRecord($url)
    {
        $u_id = bin2hex(random_bytes(8));
        $sql = "INSERT INTO $this->urlTable (url, u_id) VALUES(?, ?)";
        $stmt = $this->con->prepare($sql);

        if ($stmt === false) {
            echo mysqli_error($this->con);
        } else {
            $stmt->bind_param("ss", $url, $u_id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function displayRecords()
    {
        $sql = "SELECT * FROM $this->urlTable ORDER BY id";
        $stmt = $this->con->prepare($sql);
        if ($stmt === false) {
            echo mysqli_error($this->con);
        } else {
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $data = $result->fetch_all(MYSQLI_ASSOC);
                    return $data;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function displayRecord($u_id)
    {
        $sql = "SELECT * FROM $this->urlTable WHERE u_id = '$u_id'";
        $stmt = $this->con->prepare($sql);
        if ($stmt === false) {
            echo mysqli_error($this->con);
        } else {
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $data = $result->fetch_object();
                    return $data;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function updateClicks($clicks, $u_id)
    {
        $sql = "UPDATE $this->urlTable SET clicks = $clicks WHERE u_id = '$u_id'";
        $stmt = $this->con->prepare($sql);
        if ($stmt === false) {
            echo mysqli_error($this->con);
        } else {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function deleteRecord($id)
    {
        $sql = "DELETE FROM $this->urlTable WHERE id = '$id'";
        $stmt = $this->con->prepare($sql);
        if ($stmt === false) {
            echo mysqli_error($this->con);
        } else {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function displayRecordClicks($id)
    {
        $sql = "SELECT clicks FROM $this->urlTable WHERE id = '$id'";
        $stmt = $this->con->prepare($sql);
        if ($stmt === false) {
            echo mysqli_error($this->con);
        } else {
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $data = $result->fetch_all(MYSQLI_ASSOC);
                    return $data;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function totalRowCount()
    {
        $sql = "SELECT COUNT(*) FROM $this->urlTable";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($num_rows);
        $stmt->fetch();
        return $num_rows;
    }
}