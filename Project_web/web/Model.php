<?php
class Model
{
    public $con = "";
    public  function __construct()
    {
        $this->con = new mysqli('localhost','root','','online _shopping');
    }
    public function SelectAll($tbl)
    {
        $sql = "SELECT * FROM $tbl";
        $q = $this->con->query($sql);
        while ($fetch = $q->fetch_object())
        {
            $res[] = $fetch;
        }
        return $res;
    }
    public function InsertData($tbl,$data)
    {
        $dk = array_keys($data);
        $k = implode(",",$dk);
        $dv  = array_values($data);
        $v = implode("','",$dv);


        $sql = "INSERT INTO $tbl ($k) VALUES('$v')";
        // echo $sql;exit;
        $q = $this->con->query($sql);
        return $q;
    }
    public function Select_Where($tbl,$where)
    {
        $sql = "SELECT * FROM $tbl WHERE 1=1 ";
        $key = array_keys($where);
        $val = array_values($where);
        $i = 0;

        foreach($where as $w)
        {
            $sql.=" AND $key[$i]= '$val[$i]'";
            $i++;
        }
        // echo $sql;exit;
        $q = $this->con->query($sql);
        return $q;
    }

    function Join_data($tbl1,$tbl2,$on)
        {
            $sql = "SELECT * FROM $tbl1 JOIN $tbl2 on $on";
            // echo $sql;exit;
            $q = $this->con->query($sql);
            while ($fetch = $q->fetch_object())
            {
                $res[] = $fetch;
            }
            return $res;
        }
}

?>