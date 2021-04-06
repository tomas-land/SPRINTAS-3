<?php

namespace Models;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /** 
     * @ORM\Column(type="string")
     */
    protected $username;
        /** 
     * @ORM\Column(type="string")
     */
    protected $password;


// function __construct($id,$title)
// {
//     $this->id = $id;
//     $this->title = $title;
// }

    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    // public function getTitle(){
    //     return $this->title;
    // }
    
    public function setTitle($title){
        $this->title = $title;
    }
    
}

