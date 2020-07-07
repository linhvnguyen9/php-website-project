<?php

class User
{
    public $id;
    public $maSV;
    public $hoTen;
    public $role;

    /**
     * User constructor.
     * @param $id
     * @param $maSV
     * @param $hoTen
     * @param $role
     */
    public function __construct($id, $maSV, $hoTen, $role)
    {
        $this->id = $id;
        $this->maSV = $maSV;
        $this->hoTen = $hoTen;
        $this->role = $role;
    }


}