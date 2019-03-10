<?php 

namespace MicroForce\Model;

use MicroForce\Connection\ConnectionSingleton;

class Student {
    
    private $id;
    
    private $firstname;
    
    private $lastname;
    
    //###############################//
    //########### GETTER ############//
    //###############################//
    public function getId()
    {
        return $this->id;
    }

    public function getFirstname()   
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    //###############################//
    //########### SETTER ############//
    //###############################//
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    //###############################//
    //############# CRUD ############//
    //###############################//
    public function create(string $firstname, string $lastname) : ?Student {
        //
        // Set the connection in the heart of the application and then in the Model I get the connection
        //
        $connection = ConnectionSingleton::getConnection();
        try {
            $stmt = $connection->prepare('INSERT INTO students(firstname, lastname) VALUE (:firstname, :lastname)');
            $stmt->bindValue('firstname', $firstname);
            $stmt->bindValue('lastname', $lastname);
            
            $this->id = $connection->lastInsertId();
            $this->firstname = $firstname;
            $this->lastname = $lastname;     
        } catch (\Exception $e) {
            return null;
        }
        return $this;
    }

    public function update() : Student {
        $connection = ConnectionSingleton::getConnection();
        $stmt = $connection->prepare(
            'UPDATE students SET firstname = :firstname, lastname = :lastname WHERE id = :id'
        );
        $stmt->bindValue('firstname', $this->firstname);
        $stmt->bindValue('lastname', $this->lastname);
        $stmt->bindValue('id', $this->id);
        $stmt->execute();
        
        return $this;
    }
    
    public function delete() : bool {
        $connection = ConnectionSingleton::getConnection();
        $stmt = $connection->prepare('DELETE FROM students WHERE id = :id');
        $stmt->execute(['id' => $this->id]);
        return true;
    }

    static public function findAll() : array {
        $connection = ConnectionSingleton::getConnection();
        /**
         * 
         * @var \PDOStatement $stmt
         * @var \PDO $connection
         */
        $stmt = $connection->query('SELECT * FROM students');
        return $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        //__CLASS__ = Student::class
        // FETCH_CLASS = schema dans mon calepin
    }
    
}
