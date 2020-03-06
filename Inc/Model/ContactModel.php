<?php

namespace Inc\Model;

class ContactModel
{
    private $id;
    private $object;
    private $email;
    private $content;
    private $created_at;

    public function Contact()
    {
        return '<p><a href="viewContact.php?id=' . $this->id . '">' . $this->objet . '</a></p>';
    }

    public function viewFullContact()
    {
        $html = '<div class="contact">';
        $html .= '<h2>' . $this->objet . '</h2>';
        $html .= '<p>' . $this->email . '</p>';
        $html .= '<p>' . $this->content . '</p>';
        $date = new \DateTime($this->created_at);
        $html .= '<p>Date' . $date->format('d/m/Y') . '</p>';
        return $html;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }


}