<?php

class Connections
{
    private int $id;
    private int $userId;
    private int $connectedTo;
    private string $connectedOn;

    public function createNew(int $userId, int $connectedTo): Connections
    {
        try {
            $dbh = Db::getConnection();
            //query
            $sql = "INSERT INTO connections (id, userId, connectedTo, connectedOn)
                VALUES (NULL, :userId, :connectedTo, :connectedOn)";
            //prepare query
            $stmt = $dbh->prepare($sql);
            //get actual time of when Connection is created
            $connectedOn = date("Y-m-d H:i:s");
            //binding parameters to avoid injections
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':connectedTo', $connectedTo);
            $stmt->bindParam(':connectedOn', $connectedOn);
            //execute prepared statement filled with parameters
            $stmt->execute();
            //store in $id the last id inserted in Db
            $id = $dbh->lastInsertId();
            // return as result of this function a new object User
            $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        return new Connections($id, $userId, $connectedTo, $connectedOn);

    }

    public function getConnections(User $user): array
    {
        try {
            $dbh = Db::getConnection();
            $sql = "SELECT connectedTo FROM connections WHERE userId =:userId";
            $stmt = $dbh->prepare($sql);
            $uId = $user->getId();
            $stmt->bindParam(':userId', $uId);
            $stmt->execute();
            $dbh = null;
        } catch (PDOException $c) {
            throw new Exception($c->getMessage() . ' ' . $c->getFile() . ' ' . $c->getCode() . ' ' . $c->getLine());
        }
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
    }

    public function checkIfConnected(int $myId, int $friendsId): Connections|null
    {
        $dbh = Db::getConnection();
        $sql = "SELECT * FROM connections WHERE userId =:myId AND connectedTo =:friendsId";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':myId', $myId);
        $stmt->bindParam(':friendsId', $friendsId);
        $stmt->execute();
        $result = $stmt->fetchObject( Connections::class);
        if ($result) {
            //if a row is found, create an Object and return it
            $dbh = null;
            return $result;
        } else {
            //if no row is found, return null
            return null;
        }
    }


    public
    function delete(int $id): void
    {
        try {
            $dbh = Db::getConnection();
            $sql = "DELETE FROM connections WHERE id=:id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
    }

    /**
     * @param int|null $id
     * @param int|null $userId
     * @param int|null $connectedTo
     * @param string|null $connectedOn
     */
    public
    function __construct(int|null $id = null, int|null $userId = null, int|null $connectedTo = null, string|null $connectedOn = null)
    {
        if (isset ($id) && isset($this->userId) && isset($connectedTo) && isset($this->connectedOn)) {
            $this->id = $id;
            $this->userId = $userId;
            $this->connectedTo = $connectedTo;
            $this->connectedOn = $connectedOn;
        }
    }

    /**
     * @return int
     */
    public
    function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public
    function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public
    function getConnectedTo(): int
    {
        return $this->connectedTo;
    }

    /**
     * @return string
     */
    public
    function getConnectedOn(): string
    {
        return $this->connectedOn;
    }


}