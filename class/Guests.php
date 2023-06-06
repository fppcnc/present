<?php

class Guests
{
private int $connectedToId;
private int $fullEventId;

    /**
     * @param int $connectedToId
     * @param int $fullEventId
     */
    public function __construct(int $connectedToId, int $fullEventId)
    {
        $this->connectedToId = $connectedToId;
        $this->fullEventId = $fullEventId;
    }

    /**
     * @return int
     */
    public function getConnectedToId(): int
    {
        return $this->connectedToId;
    }

    /**
     * @return int
     */
    public function getFullEventId(): int
    {
        return $this->fullEventId;
    }
}