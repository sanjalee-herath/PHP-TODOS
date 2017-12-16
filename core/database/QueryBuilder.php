<?php

class QueryBuilder{

    protected $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function selectAll($table,$userid){
        $statement = $this->pdo->prepare("select * from {$table} where user_id = {$userid}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);

    }

    public function insert($table,$values){

        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(',',array_keys($values)),
            ':'. implode(', :',array_keys($values)) //"insert into {$table}(name,pass) values(:name,:pass)"
        );

       // die(var_dump($sql));
        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute($values);
        }catch(Exception $e){
           die($e->getMessage()) ;
        }
        
    }

    public function delete($table,$userid,$taskid){

        $sql = "delete from {$table} where user_id = {$userid} AND id = {$taskid}";

        try{
             $this->pdo->exec($sql);

        }catch(Exception $e){
            die($e->getMessage()) ;
         }
    }

    public function checklogin($userid,$pwd){

        $sql = "select id , password from user where id = {$userid} and password = {$pwd}";

        $statement = $this->pdo->prepare($sql);

        try{
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage()) ;
         }
        
    
        
    }
}