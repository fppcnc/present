<?php

class Wishlist
{
private int $id;
private int $createdBy;
private string $creationTime;

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