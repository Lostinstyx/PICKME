<?php
namespace Inc\Modeles;

class ContactModels
{
 private $id;
 private $objet;
 private $email;
 private $content;
 private $created_at;

 public function Contact()
 {
     return '<p><a href="viewContact.php?id='.$this->id.'">'.$this->objet.'</a></p>';
 }
 public function viewFullContact()
 {
    $html = '<div class="contact">';
    $html .= '<h2>'.$this->objet.'</h2>';
    $html .= '<p>'.$this->email.'</p>';
    $html .= '<p>'.$this->content.'</p>';
    $date = new \DateTime($this->created_at);
     $html .= '<p>Date'.$date->format('d/m/Y').'</p>';
     return $html;
 }
}