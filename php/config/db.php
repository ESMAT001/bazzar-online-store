<?php
class Database
{
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $db;


    function __construct($host,$username,$password,$dbName) {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;       
     }


    function init(){
        $db= new mysqli($this->host, $this->username, $this->password,$this->dbName);
        // Check connection
        if ($db->connect_error) {
          die("Connection failed: " . $db->connect_error);
        }else{
            $this->db=$db;
        }
     }


    function getAllData($tblName,$limit=null){
         $db=$this->db;
         $query;
          if ($limit!==null) {
            $query="SELECT * FROM `$tblName` LIMIT '$limit'";
          }else{
            $query="SELECT * FROM `$tblName`";
          }       
          $result=$db->query($query);
         if ($result) {
            if ($result->num_rows>0) {
                $data=array();
                 while ($row = $result->fetch_assoc()) {
                  array_push($data,$row);
                }
                return $data;
              }else{
                 echo "0 result";
              }
         }else{
            echo "0 result";
         }
     }

     
     function insertData($tblName,$data,$fields){
       $db=$this->db;
      if (count($data)===count($fields)) {
        $query="INSERT INTO $tblName(";
        for ($i=0; $i < count($fields); $i++) { 
          if ($i===count($fields)-1) {
            $query.=$fields[$i];
          }else{
            $query.=$fields[$i].",";
          }
        }
        $query.=") VALUES ('";
        for ($i=0; $i < count($data); $i++) { 
          if ($i===count($data)-1) {
            $query.=$data[$i]."'";
          }else{
            $query.=$data[$i]."','";
          }
         }  
        
        $query.=")";
        $result=$db->query($query);
        return $result;
      }else {
        return "error";
      }
    }


     function customQuery($query){
      $db=$this->db;
      $result=$db->query($query);
      if ($result) {
        if ($result->num_rows>0) {
            $data=array();
             while ($row = $result->fetch_assoc()) {
              array_push($data,$row);
            }
            return $data;
          }else{
             echo "0 result";
          }
      }else{
        echo "0 result";
      }
     }

     function secure($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

}
