<?php 
    include('database.php');
    class DB extends Database{
        private $con;
        public $lastID;
        public $tbl=array('tbl_slide','tbl_category','tbl_sub_category','tbl_product','tbl_customer','tbl_user','tbl_invoice','tbl_invoice_detail');
        public function Connect()
        {
            $this->con = new mysqli($this->host, $this->Dbuser, $this->dbPass, $this->dbName);
            $this->con->set_charset('utf8');
        }
        function __construct()
        {
            $this->Connect();
        }
        public function SaveData($tbl, $val)
        {
            // $this->Connect();
            $sql = "INSERT INTO $tbl VALUES($val)";
            $this->con->query($sql);
            $this->lastID = $this->con->insert_id;
        }
        public function UpdateData($tbl, $fld, $cond)
        {
            // $this->Connect();
            $sql = "UPDATE $tbl SET $fld WHERE $cond";
            $this->con->query($sql);
        }
        public function dplData($fld, $tbl, $cond)
        {
            // $this->Connect();
            $sql = "SELECT $fld FROM $tbl WHERE $cond";
            $rs = $this->con->query($sql);
            if ($rs->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        }
        public function realStr($fld)
        {
            // $this->Connect();
            return $this->con->real_escape_string($fld);
        }
        public function CountData($tbl, $cond)
        {
            // $this->Connect();
            $sql = "SELECT COUNT(*) AS total FROM $tbl WHERE $cond";
            $rs = $this->con->query($sql);
            $row = $rs->fetch_array();
            return $row[0];
        }
        public function GetData($tbl, $cond, $fld, $od, $s, $e)
        {
            // $this->Connect();
            $data = array();
            $sql = "SELECT $fld FROM $tbl WHERE $cond ORDER BY $od  LIMIT $s,$e";
            $rs = $this->con->query($sql);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_array()) {
                    $data[] = $row;
                }
                return $data;
            }
            return 0;
        }
        public function GetCuurentData($tbl, $cond, $fld)
        {
            $sql = "SELECT $fld FROM $tbl WHERE $cond";
            $rs = $this->con->query($sql);
            $row=0;
            if ($rs->num_rows > 0) {
                $row=$rs->fetch_array();
            }
            return $row;
        }
        public function slugStr($str)
        {
            return preg_replace("#(\p{P}|\p{C}|\p{S}|\{Z})+#u", "-", $str);
        }
        public function get_auto_id($fld,$opt){
            $sql="SELECT $fld FROM ".$this-> tbl[$opt]." ORDER BY $fld DESC";
            $res=$this->con->query($sql);
            $num=$res->num_rows;
            if($num==0){
                return 1;
            }else{
                $row=$res->fetch_array();
                return $row[0]+1;
            }
        }
    }
?>
