<?php

class Guests
{
private int $guestId;
private int $eventId;

    /**
     * @param int $connectedToId
     * @param int $eventId
     * @return Guests
     * @throws Exception
     */
    public function createNew(array $guestIds, int $eventId): array
    {
        try {
            $guests = [];
            $dbh = Db::getConnection();
            $sql = "INSERT INTO guests (guestId, eventId) VALUES (:guestId, :eventId)";
            $stmt = $dbh->prepare($sql);
            foreach ($guestIds as $guestId) {

            $stmt->bindParam(':guestId', $guestId);
            $stmt->bindParam(':eventId', $eventId);
            $stmt->execute();
            $guests[] = new Guests($guestId, $eventId);
        }
            $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        return $guests;
    }

    /**
     * @param int|null $connectedToId
     * @param int|null $eventId
     */
    public function __construct(int|null $guestId = null, int|null $eventId = null)
    {
        if (isset($guestId) && isset($eventId)) {
            $this->guestId = $guestId;
            $this->eventId = $eventId;
        }
    }

    /**
     * @return int
     */
    public function getGuestId(): int
    {
        return $this->guestId;
    }

    /**
     * @return int
     */
    public function getEventId(): int
    {
        return $this->eventId;
    }


}