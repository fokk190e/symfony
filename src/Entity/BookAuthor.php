<?php

namespace App\Entity\Library\Book;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="book_author")
 * @ORM\Entity
 */
class BookAuthor
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=8, unique=true, options={"unsigned"=true})
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Book", mappedBy="authors")
     */
    private $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
