<?php

class Connections
{
private int $id;
private int $userId;
private int $connectedToId;

    /**
     * @param int $id
     * @param int $userId
     * @param int $connectedToId
     */
    public function __construct(int $id, int $userId, int $connectedToId)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->connectedToId = $connectedToId;
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

}