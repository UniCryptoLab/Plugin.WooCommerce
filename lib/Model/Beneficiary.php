<?php

namespace UniPayment\SDK\Model;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Beneficiary
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class Beneficiary
{
    private ?string $id = null;
    private string $name;
    private string $email;
    private string $type;
    private string $relationship;
    private ?string $address = null;
    private ?string $city = null;
    private ?string $state = null;
    private ?string $country = null;
    /**
     * @SerializedName("zip_code")
     */
    private ?string $zipcode;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getRelationship(): string
    {
        return $this->relationship;
    }

    public function setRelationship(string $relationship): void
    {
        $this->relationship = $relationship;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(?string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }
}