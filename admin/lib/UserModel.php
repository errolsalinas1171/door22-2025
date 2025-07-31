<?php
namespace Phppot;

use Phppot\DataSource;

class UserModel
{

    private $conn;

    function __construct()
    {
        require_once 'DataSource.php';
        $this->conn = new DataSource();
    }

    function getAllUser()
    {
        $sqlSelect = "SELECT * FROM wifi_vouchers_sample";
        $result = $this->conn->select($sqlSelect);
        return $result;
    }

    function readUserRecords()
    {
        $fileName = $_FILES["file"]["tmp_name"];
        if ($_FILES["file"]["size"] > 0) {
            $file = fopen($fileName, "r");
            $importCount = 0;
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                if (! empty($column) && is_array($column)) {
                    if ($this->hasEmptyRow($column)) {
                        continue;
                    }
                    if (isset($column[1])) {
                        $wifi_voucher = $column[0];
                        $wifi_voucher_code = $column[1];
                        $wifi_voucher_days = $column[2];
                        $wifi_price = $column[3];
                        $date_added = date('Y-m-d H:i:s');
                        $voucher_status = 'enabled';
                        $insertId = $this->insertUser($wifi_voucher, $wifi_voucher_code, $wifi_voucher_days, $wifi_price, $date_added, $voucher_status);
                        if (! empty($insertId)) {
                            $output["type"] = "success";
                            $output["message"] = "Import completed.";
                            $importCount ++;
                        }
                    }
                } else {
                    $output["type"] = "error";
                    $output["message"] = "Problem in importing data.";
                }
            }
            if ($importCount == 0) {
                $output["type"] = "error";
                $output["message"] = "Duplicate data found.";
            }
            return $output;
        }
    }

    function hasEmptyRow(array $column)
    {
        $columnCount = count($column);
        $isEmpty = true;
        for ($i = 0; $i < $columnCount; $i ++) {
            if (! empty($column[$i]) || $column[$i] !== '') {
                $isEmpty = false;
            }
        }
        return $isEmpty;
    }

    function insertUser($wifi_voucher, $wifi_voucher_code, $wifi_voucher_days, $wifi_price, $date_added, $voucher_status)
    {
        $sql = "SELECT wifi_voucher FROM wifi_vouchers WHERE wifi_voucher_code = ?";
        $paramType = "s";
        $paramArray = array(
            $wifi_voucher
        );
        $result = $this->conn->select($sql, $paramType, $paramArray);
        $insertId = 0;
        if (empty($result)) {
            //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT into wifi_vouchers (wifi_voucher,wifi_voucher_code,wifi_voucher_days,wifi_price,date_added,voucher_status)
                       values (?,?,?,?,?,?)";
            $paramType = "ssssss";
            $paramArray = array(
                $wifi_voucher,
                $wifi_voucher_code,
                $wifi_voucher_days,
                $wifi_price,
                $date_added,
                $voucher_status
            );
            $insertId = $this->conn->insert($sql, $paramType, $paramArray);
        }
        return $insertId;
    }
}
?>