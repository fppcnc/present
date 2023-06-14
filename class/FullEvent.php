<?php

class FullEvent
{
    private int $id;
    private int $wishlistId;
    private int $eventId;

    /**
     * @param int $id
     * @param int $wishlistId
     * @param int $eventId
     */
    public function __construct(int $id, int $wishlistId, int $eventId)
    {
        $this->id = $id;
        $this->wishlistId = $wishlistId;
        $this->eventId = $eventId;
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
    public function getWishlistId(): int
    {
        return $this->wishlistId;
    }

    /**
     * @return int
     */
    public function getEventId(): int
    {
        return $this->eventId;
    }
}