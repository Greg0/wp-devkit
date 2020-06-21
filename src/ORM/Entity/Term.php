<?php


namespace Plugin\DevKit\ORM\Entity;


class Term
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $slug;

    /** @var int */
    private $group;

    public function __construct(int $id, string $name, string $slug, int $group)
    {
        $this->id    = $id;
        $this->name  = $name;
        $this->slug  = $slug;
        $this->group = $group;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function setGroup(int $group): void
    {
        $this->group = $group;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getGroup(): int
    {
        return $this->group;
    }

}
