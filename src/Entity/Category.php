<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="")
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer", unique=true, options={"unsigned"=true})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Post", inversedBy="category")
     * @ORM\JoinTable(name="category_post")
     */
    private $posts;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Post $post
     */
    public function addTag(Post $post):void
    {
        $this->posts[] = $post;
    }

    /**
     * @return ArrayCollection|Post[]
     */
    public function getTags():ArrayCollection
    {
        return $this->posts;
    }

    /**
     * @param Post $post
     * @return bool
     */
    public function removeTag(Post $post): bool
    {
        return $this->posts->removeElement($post);
    }
}
