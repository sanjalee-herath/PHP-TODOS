<?php

class QueryBuilder{

    protected $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function getUserId($username){

        $statement = $this->pdo->prepare("select id from user where name like '{$username}'");
        
        try{
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage()) ;
        }

    }

    public function selectTasks($table,$username){

        $user = $this->getUserId($username);

        $statement = $this->pdo->prepare("select id , name from {$table} where user_id = {$user['id']}");

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);

    }

    public function selectTask($username,$taskid){

        $user = $this->getUserId($username);

        $statement = $this->pdo->prepare(
            "select id , name, description from task where user_id = {$user['id']} and id = {$taskid}"
        );
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);

    }


    public function updateTask($taskid,$name,$description,$username){

        $user = $this->getUserId($username);

        $sql = "UPDATE task SET name = :name ,description = :description WHERE user_id = :userid AND id = :taskid";

        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute(array
                (':name' => $name ,':description' => $description , ':userid' => $user['id'] , ':taskid' => $taskid)
            );

        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
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

    public function insertTask($name,$description,$username){

        $user = $this->getUserId($username);

        $statement = $this->pdo->prepare(
            "insert into task (name,description,user_id) values (:name,:description,:user_id)"
        );

        try{
            $statement->execute([
                'name' => $name,
                'description' => $description,
                'user_id' => $user['id']
            ]);
        }catch(Exception $e){
           die($e->getMessage()) ;
        }

    }

    public function delete($table,$username,$taskid){

        $user = $this->getUserId($username);

        $sql = "delete from {$table} where user_id = {$user['id']} AND id = {$taskid}";

        try{
             $this->pdo->exec($sql);

        }catch(Exception $e){
            die($e->getMessage()) ;
         }
    }

    public function checklogin($username){

        $sql = "select password from user where name like '{$username}'";

        $statement = $this->pdo->prepare($sql);

        try{
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage()) ;
         }
        
    
        
    }

    public function update($taskid,$des,$username){

        $user = $this->getUserId($username);

        $sql = " UPDATE 'task' SET 'description' = :des WHERE user_id = :userid AND id = :taskid ";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":des", $des);
        $statement->bindValue(":userid", $user['id']);
        $statement->bindValue(":taskid", $taskid);

        try{
            $statement->execute();
        } catch(Exception $e){
            die($e->getMessage()) ;
        }
        
    }

    public function getUser($username){

        $sql = "select name from user where name like '{$username}'";

        $statement = $this->pdo->prepare($sql);
        
        try{
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage()) ;
        }
    }
}