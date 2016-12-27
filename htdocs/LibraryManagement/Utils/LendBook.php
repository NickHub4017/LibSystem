<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class LendBook {

    
    var $copyid;
    var $membership_id;
    var $usertype;
    /**
     * @return mixed
     */
    public function getMembership_id()
    {
        return $this->membership_id;
    }

    /**
     * @param mixed $Bookdata
     */
    public function setMembership_id($membership_id)
    {
        $this->membership_id = $membership_id;
    }

    /**
     * @return mixed
     */
    public function getCopyid()
    {
        return $this->copyid;
    }

    /**
     * @param mixed $copyid
     */
    
    public function setCopyid($copyid)
    {
        $this->copyid = $copyid;
    }
    
   
    public function setUserType($usertype)
    {
        $this->usertype = $usertype;
    }
    
     public function getUserType()
    {
        return $this->usertype;
    }

  

}