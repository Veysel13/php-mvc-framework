<?php

/**
 * Created by PhpStorm.
 * User: dilsi
 * Date: 17.10.2016
 * Time: 09:15
 */



trait craud
{

private $result;
    private $host="localhost";
    private $dbname="deneme";
    private $user="root";
    private $password="";
    private $where;
    protected $connect;
    private $array;
    private $col;

    function __construct(){

        $this->connect=new \PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8",$this->user,$this->password);

    }

    function __set($name, $value)
    {
        $this->col[$name]=$value;

    }

    public function find($id){

        $this->result=$this->connect->prepare("select * from ".$this->table." where id=:id");
        $this->result->bindParam("id",$id);
        $this->result->execute();
        $this->result=$this->result->fetch(\PDO::FETCH_ASSOC);

       return $this->result;



    }



    public function where($where){

     $this->where=" where $where";

        return $this;
    }



    public function get(){

        $this->result=$this->connect->query("select * from ".$this->table.$this->where);

       while($a=$this->result->fetch(PDO::FETCH_ASSOC)){


           $this->array[]=$a;
       }


       return $this->array;




    }






    public function delete(){

return $this->connect->exec("delete  from ".$this->table.$this->where);






    }


}
