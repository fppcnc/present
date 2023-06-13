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
    }/**
 * @return int
 */
public function getId(): int
{
    return $this->id;
}/**
 * @return int
 */
public function getOrganizedBy(): int
{
    return $this->organizedBy;
}/**
 * @return string
 */
public function getName(): string
{
    return $this->name;
}/**
 * @return string
 */
public function getDate(): string
{
    return $this->date;
}/**
 * @return string
 */
public function getPlace(): string
{
    return $this->place;
}/**
 * @return string
 */
public function getPublic(): string
{
    return $this->public;
}/**
 * @return string
 */
public function getCreationTime(): string
{
    return $this->creationTime;
}


}