<?php


namespace Plugin\TestPlugin\Entity;


class Option
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $value;

    /** @var string */
    private $autoload;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
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

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getAutoload(): bool
    {
        return $this->autoload === 'yes';
    }

    public function setAutoload(string $autoload): void
    {
        $this->autoload = $autoload;
    }

}
