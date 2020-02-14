<?php
namespace Inc\Model;

use \DateTime;
class ArticleModel
{
  private $id;
  private $title;
  private $content;
  private $created_at;
  private $status;

  public function OneSmallArticle()
  {
      return '<p><a href="single.php?id='.$this->id.'">'.$this->title.'</a></p>';
  }

  public function viewBigOneArticle()
  {
    $html = '<div class="onearticle">';
      $html .= '<h2>'. $this->title .'</h2>';
      $html .= '<p>'. $this->content .'</p>';
      $html .= '<p>Status: '. $this->status .'</p>';
      $date = new \DateTime($this->created_at);
      $html .= '<p>Date: ' . $date->format('d/m/Y') . '</p>';
    $html .= '</div>';
    return $html;
  }

  // public function getId()
  // {
  //   return $this->id;
  // }







    public function item()
    {
      echo $this->id;
    }
}
