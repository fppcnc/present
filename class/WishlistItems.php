<?php

class WishlistItems
{
    private int $id;
    private int $wishlistId;
    private string $description;
    private string $externalLink;

    /**
     * @param int|null $id
     * @param int|null $wishlistId
     * @param string|null $description
     * @param string|null $externalLink
     */
    public function __construct(int|null $id = null, int|null $wishlistId = null, string|null $description = null, string|null $externalLink = null)
    {
        if (isset($id) && isset($wishlistId) && isset($description) && isset($externalLink))
            $this->id = $id;
        $this->wishlistId = $wishlistId;
        $this->description = $description;
        $this->externalLink = $externalLink;
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getExternalLink(): string
    {
        return $this->externalLink;
    }

}