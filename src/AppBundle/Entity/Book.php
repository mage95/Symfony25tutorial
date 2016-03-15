<?php


namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Entity
 * @ORM\Table(name="book")
 */
class Book
{
    /**
     * @var integer
     *
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    /**
     * @var string
     *
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;
    /**
     * @var string
     *
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;
    /**
     * @var string
     *
     *
     * @ORM\Column(name="genre", type="string", length=255, nullable=true)
     */
    private $genre;
    /**
     * @var string
     *
     *
     * @ORM\Column(name="book_cover_file_path", type="string", length=255, nullable=true)
     */
    private $bookCoverFilePath;
    /**
     * @var \DateTime
     *
     *
     * @ORM\Column(name="published_date", type="datetime", nullable=true )
     */
    private $publishedDate;
    /**
     * @var \DateTime
     *
     *
     * @ORM\Column(name="registered_date", type="datetime", nullable=true)
     */
    private $registeredDate;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Book
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Book
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set bookCoverFilePath
     *
     * @param string $bookCoverFilePath
     * @return Book
     */
    public function setBookCoverFilePath($bookCoverFilePath)
    {
        $this->bookCoverFilePath = $bookCoverFilePath;

        return $this;
    }

    /**
     * Get bookCoverFilePath
     *
     * @return string 
     */
    public function getBookCoverFilePath()
    {
        return $this->bookCoverFilePath;
    }

    /**
     * Set publishedDate
     *
     * @param \DateTime $publishedDate
     * @return Book
     */
    public function setPublishedDate($publishedDate)
    {
        $this->publishedDate = $publishedDate;

        return $this;
    }

    /**
     * Get publishedDate
     *
     * @return \DateTime 
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }

    /**
     * Set registeredDate
     *
     * @param \DateTime $registeredDate
     * @return Book
     */
    public function setRegisteredDate($registeredDate)
    {
        $this->registeredDate = $registeredDate;

        return $this;
    }

    /**
     * Get registeredDate
     *
     * @return \DateTime 
     */
    public function getRegisteredDate()
    {
        return $this->registeredDate;
    }
}
