<?php

class Wishlist
{
    private int $id;
    private int $createdBy;
    private string $creationTime;

    public function createNew(int $createdBy): Wishlist
    {
        try {
            $dbh = Db::getConnection();
            //query
            $sql = "INSERT INTO wishlist (id, createdBy, creationTime)
                VALUES (NULL, :createdBy, :creationTime)";
            //prepare query
            $stmt = $dbh->prepare($sql);
            //get actual time of when Wishlist is created
            $registrationTime = date("Y-m-d H:i:s");
            //binding parameters to avoid injections
            $stmt->bindParam(':createdBy', $createdBy);
            $stmt->bindParam(':creationTime', $creationTime);
            //execute prepared statement filled with parameters
            $stmt->execute();
            //store in $id the last id inserted in Db
            $id = $dbh->lastInsertId();
            //close connection to database
            $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        // return as result of this function a new object Wishlist
        return new Wishlist($id, $createdBy, $creationTime);
    }

    /**
     * @param int $id
     * @param int $createdBy
     * @param string $creationTime
     */
    public function __construct(int $id, int $createdBy, string $creationTime)
    {
        $this->id = $id;
        $this->createdBy = $createdBy;
        $this->creationTime = $creationTime;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCreatedBy(): int
    {
        return $this->createdBy;
    }

    /**
     * @return string
     */
    public function getCreationTime(): string
    {
        return $this->creationTime;
    }

}