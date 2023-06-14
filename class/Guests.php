<?php

class Guests implements JsonSerializable
{
private int $guestId;
private int $eventId;

    /**
     * @param array $guestIds
     * @param int $eventId
     * @return array
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
     * @param int $eventId
     * @return array
     * @throws Exception
     */
    public function getGuestsByEventId(int $eventId): array
    {
        try {
            $dbh = Db::getConnection();
            $sql = "SELECT * FROM guests WHERE eventId = :eventId";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':eventId', $eventId);
            $stmt->execute();
            $guests = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $guest = new Guests($row['guestId'], $row['eventId']);
                $guests[] = $guest;
            }
            $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        return $guests;
    }

    public function jsonSerialize(): array {
        return ['guestId' => $this->getGuestId()];
    }

    public function search(int $eventId, int $guestId): array|null
    {
            try {
                $dbh = Db::getConnection();
                $sql = "SELECT * FROM guests WHERE eventId = :eventId AND guestId =:guestId";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':eventId', $eventId);
                $stmt->bindParam(':guestId', $guestId);
                $stmt->execute();
                $dbh = null;

            } catch (PDOException $e) {
                throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
            }
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Guests');
        }

    /**
     * @param int|null $guestId
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