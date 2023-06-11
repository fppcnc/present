<?php

class Connections
{
    private int $id;
    private int $userId;
    private int $connectedToId;
    private string $connectedOn;

    public function getConnections(User $user): array
    {
        $dbh = Db::getConnectionSelect();
        $sql = "SELECT connectedTo FROM connections WHERE userId =:userId";
        $stmt = $dbh->prepare($sql);
        $uId = $user->getId();
        $stmt->bindParam(':userId', $uId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
    }

    /**
     * @param int|null $id
     * @param int|null $userId
     * @param int|null $connectedToId
     * @param string|null $connectedOn
     */
    public function __construct(int|null $id = null, int|null $userId = null, int|null $connectedToId = null, string|null $connectedOn = null)
    {
        if (isset ($id) && isset($this->userId) && isset($connectedToId) && isset($this->connectedOn)) {
            $this->id = $id;
            $this->userId = $userId;
            $this->connectedToId = $connectedToId;
            $this->connectedOn = $connectedOn;
        }
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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getConnectedToId(): int
    {
        return $this->connectedToId;
    }

    /**
     * @return string
     */
    public function getConnectedOn(): string
    {
        return $this->connectedOn;
    }


}