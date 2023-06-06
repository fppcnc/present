<?php

class Event
{
private int $id;
private int $organizedBy;
private string $date;
private string $country;
private string $city;
private string $postcode;
private string $streetNr;
private string $street;
private string $creationTime;



    /**
     * @param int $id
     * @param int $organizedBy
     * @param string $date
     * @param string $country
     * @param string $city
     * @param string $postcode
     * @param string $streetNr
     * @param string $street
     * @param string $creationTime
     */
    public function __construct(int $id, int $organizedBy, string $date, string $country, string $city, string $postcode, string $streetNr, string $street, string $creationTime)
    {
        $this->id = $id;
        $this->organizedBy = $organizedBy;
        $this->date = $date;
        $this->country = $country;
        $this->city = $city;
        $this->postcode = $postcode;
        $this->streetNr = $streetNr;
        $this->street = $street;
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
    public function getOrganizedBy(): int
    {
        return $this->organizedBy;
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
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @return string
     */
    public function getStreetNr(): string
    {
        return $this->streetNr;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getCreationTime(): string
    {
        return $this->creationTime;
    }

}