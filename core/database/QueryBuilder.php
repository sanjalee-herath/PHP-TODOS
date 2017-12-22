<?php

class QueryBuilder{

    protected $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function selectTask($table,$userid){
        $statement = $this->pdo->prepare("select id , name from {$table} where user_id = {$userid}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);

    }

    public function selectTaskDes($table,$userid,$taskid){
        $statement = $this->pdo->prepare("select id , name, description from {$table} where user_id = {$userid} and id = {$taskid}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);

    }


    public function updateTask($taskid,$name,$description,$userid){
        $sql = "UPDATE task SET name = :name ,description = :description WHERE user_id = :userid AND id = :taskid";

        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute(array
                (':name' => $name ,':description' => $description , ':userid' => $userid , ':taskid' => $taskid)
            );

        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function fetchTask($userid , $taskid){

        $statement = $this->pdo->prepare("select id, name , description from task where user_id = {$userid} and id ={$taskid}");
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

    public function checklogin($userid){

        $sql = "select password from user where id = {$userid}";

        $statement = $this->pdo->prepare($sql);

        try{
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage()) ;
         }
        
    
        
    }

    public function update($taskid,$des,$userid){

        $sql = " UPDATE 'task' SET 'description' = :des WHERE user_id = :userid AND id = :taskid ";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":des", $des);
        $statement->bindValue(":userid", $userid);
        $statement->bindValue(":taskid", $taskid);

        try{
            $statement->execute();
        } catch(Exception $e){
            die($e->getMessage()) ;
        }
        
    }
}