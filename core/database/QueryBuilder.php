<?php

class QueryBuilder{

    protected $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function selectAll($table){
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);

    }

    public function insert($table,$values){

        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(',',array_keys($values)),
            ':'. implode(', :',array_keys($values)) //"insert into {$table}(name,age) values(:name,:age)"
        );

       // die(var_dump($sql));
        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute($values);
        }catch(Exception $e){
           die($e->getMessage()) ;
        }
        
    }

}