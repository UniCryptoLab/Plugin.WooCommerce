<?php

namespace UniPayment\SDK\Model;

/**
 * Currency Class
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class Currency
{
    private string $code;
    private string $name;
    private bool $is_fiat;
    private int $divisibility;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function isIsFiat(): bool
    {
        return $this->is_fiat;
    }

    public function setIsFiat(bool $is_fiat): void
    {
        $this->is_fiat = $is_fiat;
    }

    public function getDivisibility(): int
    {
        return $this->divisibility;
    }

    public function setDivisibility(int $divisibility): void
    {
        $this->divisibility = $divisibility;
    }

}