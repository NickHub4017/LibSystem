<?php
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 11/14/2016
 * Time: 3:10 AM
 */

class User {
    var $uname="";
    var $pwd="";
    var $address="";
    var $telno="";
    var $membership=null;
    var $name="";
    var $email="";

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return null
     */
    public function getMembership()
    {
        return $this->membership;
    }

    /**
     * @param null $membership
     */
    public function setMembership($membership)
    {
        $this->membership = $membership;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param string $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    /**
     * @return string
     */
    public function getTelno()
    {
        return $this->telno;
    }

    /**
     * @param string $telno
     */
    public function setTelno($telno)
    {
        $this->telno = $telno;
    }

    /**
     * @return string
     */
    public function getUname()
    {
        return $this->uname;
    }

    /**
     * @param string $uname
     */
    public function setUname($uname)
    {
        $this->uname = $uname;
    }


} 