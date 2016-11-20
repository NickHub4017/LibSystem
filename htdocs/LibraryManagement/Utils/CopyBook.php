<?php
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 11/20/2016
 * Time: 7:13 AM
 */

class CopyBook {

    var $Bookdata;
    var $copyid;

    /**
     * @return mixed
     */
    public function getBookdata()
    {
        return $this->Bookdata;
    }

    /**
     * @param mixed $Bookdata
     */
    public function setBookdata($Bookdata)
    {
        $this->Bookdata = $Bookdata;
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

} 