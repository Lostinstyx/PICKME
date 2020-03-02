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
        $html .= '<h2> Categorie :'. $this->category .'</h2>';
        $html .= '<p>Etudes : '. $this->study .'</p>';
        $html .= '<p>Experience : '. $this->experience .'</p>';
        $html .= '<p>Metier :  '.$this->work.'</p>';
        $html .= '<hr />';

        $html .= '</div>';
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
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getStudy()
    {
        return $this->study;
    }

    /**
     * @param mixed $study
     */
    public function setStudy($study): void
    {
        $this->study = $study;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience): void
    {
        $this->experience = $experience;
    }

    /**
     * @return mixed
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * @param mixed $work
     */
    public function setWork($work): void
    {
        $this->work = $work;
    }








    public function item()
    {
        echo $this->id;
    }

}
