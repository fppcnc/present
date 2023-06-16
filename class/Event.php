<?php

class Event
{
    private int $id;
    private int $organizedBy;
    private string $name;
    private string $date;
    private string $place;
    private string $public;
    private string $creationTime;

    public function createNew(int $organizedBy, string $name, string $date, string $place, string $public): Event
    {
        try {
            $dbh = Db::getConnection();
            $sql = "INSERT INTO event (id, organizedBy, name, date, place, public, creationTime)
                VALUES (NULL, :organizedBy, :name, :date, :place, :public, :creationTime)";
            $stmt = $dbh->prepare($sql);
            $creationTime = date("Y-m-d H:i:s");
            $stmt->bindParam(':organizedBy', $organizedBy);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':place', $place);
            $stmt->bindParam(':public', $public);
            $stmt->bindParam(':creationTime', $creationTime);
            $stmt->execute();
            $id = $dbh->lastInsertId();
            $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        // return as result of this function a new object User
        return new Event($id, $organizedBy, $name, $date, $place, $public, $creationTime);
    }


    /**
     * @param $column
     * @param $newValue
     * @return void
     */
    public function updateInfo($column, $newValue): void
    {
        try {
//          handle Db using user_update, which can only update data
            $dbh = Db::getConnection();
            $sql = "UPDATE event SET $column=:newValue WHERE id =:id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':newValue', $newValue);
            $stmt->execute();
            $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
    }

    /**
     * @param int $id
     * @return User
     * @throws Exception
     */
    public function getObjectFromId(int $id): Event
    {
        try {
            $dbh = Db::getConnection();
            $sql = "SELECT * FROM event WHERE id =:id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        return $stmt->fetchObject('Event');
    }

    /**
     * @param int $uId
     * @return array|false
     * @throws Exception
     */
    public function getEventsFromUserId(int $uId): array|false
    {
        try {
            $dbh = Db::getConnection();
            $sql = "SELECT * FROM event WHERE organizedBy =:uId";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':uId', $uId);
            $stmt->execute();
            $events = [];
            while ($row = $stmt->fetchObject('Event')) {
                $events[] = $row;
            }
            $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        return $events;
    }

    public function invitedGuest($guestId): bool
    {
        try {
            $dbh = Db::getConnection();
            $sql = "SELECT * FROM guests WHERE guestId = :guestId AND eventId = :eventId";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':guestId', $guestId);
            $stmt->bindParam(':eventId', $this->eventId);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            $dbh = null;
            // return true if count is greater than 0, false otherwise
            return $count > 0;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
    }

    public function getEventsByUserId(int $userId): array
    {
        try {
            $dbh = Db::getConnection();
            $sql = "SELECT DISTINCT * FROM event AS e
              LEFT JOIN guests AS g ON g.eventId = e.id
              WHERE (e.public = 'true' AND EXISTS (
                  SELECT 1
                  FROM connections AS c
                  WHERE c.connectedTo = e.organizedBy AND c.userId = :userId
              ))
              OR (e.public = 'false' AND g.guestId = :userId)
              ORDER BY e.date ASC";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $events = [];
            while ($row = $stmt->fetchObject('Event')) {
                $events[] = $row;
            }
        } catch
        (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        return $events;
    }

    public function delete(int $id):void
    {
        try {
            $dbh = Db::getConnection();
            $sql = "DELETE FROM event WHERE id=:id";
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
     * @param int|null $organizedBy
     * @param string|null $name
     * @param string|null $date
     * @param string|null $place
     * @param string|null $public
     * @param string|null $creationTime
     */
    public function __construct(int|null $id = null, int|null $organizedBy = null, string|null $name = null, string|null $date = null, string|null $place = null, string|null $public = null, string|null $creationTime = null)
    {
        if (isset($id) && isset($organizedBy) && isset($name) && isset($date) && isset($place) && isset($public) && isset($creationTime)) {

            $this->id = $id;
            $this->organizedBy = $organizedBy;
            $this->name = $name;
            $this->date = $date;
            $this->place = $place;
            $this->public = $public;
            $this->creationTime = $creationTime;
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
    public function getOrganizedBy(): int
    {
        return $this->organizedBy;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getPlace(): string
    {
        return $this->place;
    }

    /**
     * @return string
     */
    public function getPublic(): string
    {
        return $this->public;
    }

    /**
     * @return string
     */
    public function getCreationTime(): string
    {
        return $this->creationTime;
    }


}