<?php

class Connections
{
private int $id;
private int $userId;
private int $connectedToId;
private string $connectedOn;

    /**
     * @param int $id
     * @param int $userId
     * @param int $connectedToId
     * @param string $connectedOn
     */
    public function __construct(int $id, int $userId, int $connectedToId, string $connectedOn)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->connectedToId = $connectedToId;
        $this->connectedOn = $connectedOn;
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