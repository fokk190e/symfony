<?php

namespace App\Entity\Library\Book;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="books")
 * @ORM\Entity
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11, unique=true, options={"unsigned"=true})
     * @ORM\GeneratedValue
     *
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @ORM\Column(name="language_id", type="integer", length=6, options={"unsigned"=true})
     */
    private $language_id;


    /**
     * @ORM\Column(name="program_id", type="integer", length=6, options={"unsigned"=true})
     */
    private $program_id;


    /**
     * @ORM\Column(name="public_kind_id", type="integer", length=6, options={"unsigned"=true})
     */
    private $public_kind_id;


    /**
     * @ORM\Column(name="public_type_id", type="integer", length=6, options={"unsigned"=true})
     */
    private $public_type_id;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(name="year", type="integer", length=4, options={"unsigned"=true})
     */
    private $year;

    /**
     * @ORM\Column(name="code", type="string", length=128)
     */
    private $code;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="BookAuthor", inversedBy="books")
     * @ORM\JoinTable(name="b_authors_ba")
     */
    private $authors;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
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

    /**
     * @param mixed $language_id
     */
    public function setLanguageId($language_id): void
    {
        $this->language_id = $language_id;
    }

    /**
     * @return mixed
     */
    public function getLanguageId()
    {
        return $this->language_id;
    }

    /**
     * @param mixed $program_id
     */
    public function setProgramId($program_id): void
    {
        $this->program_id = $program_id;
    }

    /**
     * @return mixed
     */
    public function getProgramId()
    {
        return $this->program_id;
    }

    /**
     * @param mixed $public_kind_id
     */
    public function setPublicKindId($public_kind_id): void
    {
        $this->public_kind_id = $public_kind_id;
    }

    /**
     * @return mixed
     */
    public function getPublicKindId()
    {
        return $this->public_kind_id;
    }

    /**
     * @param mixed $public_type_id
     */
    public function setPublicTypeId($public_type_id): void
    {
        $this->public_type_id = $public_type_id;
    }

    /**
     * @return mixed
     */
    public function getPublicTypeId()
    {
        return $this->public_type_id;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year): void
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param BookAuthor $author
     */
    public function addAuthor(BookAuthor $author):void
    {
        $this->authors[] = $author;
    }

    /**
     * @return Collection|BookAuthor[]
     */
    public function getAuthors():Collection
    {
        return $this->authors;
    }
}
