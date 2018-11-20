<?php

/**
 * Class DB
 */
class DB{
    protected $db;

    /**
     * DB constructor.
     * @throws Exception
     */
    public function __construct(){
        $config = require 'config.php';
        try {
            $this->db = new PDO(
                'mysql:host='.$config['host'].';dbname='.$config['name'].';charset='.$config['charset'],
                $config['user'],
                $config['password'],
                $options = [
                    PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    /**
     * @param $query
     * @param array $params
     * @return mixed
     * @throws Exception
     */
    public function getRow($query, $params = []){
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    /**
     * @param $query
     * @param array $params
     * @return mixed
     * @throws Exception
     */
    public function getID($query, $params = []){
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    /**
     * @param $query
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getRows($query, $params = []){
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    /**
     * @param $query
     * @param array $params
     * @return bool
     * @throws Exception
     */
    public function insertRow($query, $params = []){
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return TRUE;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    /**
     * @param $query
     * @param array $params
     */
    public function updateRow($query, $params = []){
        $this->insertRow($query, $params);
    }


    /**
     * @param $query
     * @param array $params
     */
    public function deleteRow($query, $params = []){
        $this->insertRow($query, $params);
    }

}