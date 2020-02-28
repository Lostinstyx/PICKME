<?php


namespace Inc\Model;


class CvModel
{
    private $id;
    private $category;
    private $study;
    private $experience;
    private $work;


    public function viewCv()
    {
        $html = '<div class="oneCV">';
        $html .= '<h2> Categorie :'. $this->category.'</h2>';
        $html .= '<p>Etudes : '. $this->study .'</p>';
        $html .= '<p>Experience : '. $this->experience .'</p>';
        $html .= '<p>Metier :  '.$this->work.'</p>';
        $html .= '<hr />';

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
