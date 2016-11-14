<?php
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 11/14/2016
 * Time: 11:41 AM
 */

class Book {
 var $name;
    var $ISBN;
    var $Author;
    var $edition;

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->Author;
    }

    /**
     * @param mixed $Author
     */
    public function setAuthor($Author)
    {
        $this->Author = $Author;
    }

    /**
     * @return mixed
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * @param mixed $ISBN
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
    }

    /**
     * @return mixed
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * @param mixed $edition
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
} 