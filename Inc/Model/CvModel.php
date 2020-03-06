<?php


namespace Inc\Model;


class CvModel
{
    private $id;
    private $category;
    private $study;
    private $experience;
    private $work;
    private $title_formation1;
    private $formation1;
    private $title_formation2;
    private $formation2;
    private $title_experience1;
    private $experience1;
    private $title_experience2;
    private $experience2;
    private $informations;
    private $created_at;
    private $modified_at;


    public function userCv($var)
    {
        $html  = '<div class="infoProfilCv">';
        $html .= '<div class="container_informationProfil">';
        $html .= '<p class="ProfilInfcv">Catégorie : '.ucfirst($var->getCategory()).'</p>';
        $html .= '<p class="ProfilInfcv">Etudes : '.ucfirst($var->getStudy()).'</p>';
        $html .= '<p class="ProfilInfcv">Travail souhaité : '.ucfirst($var->getWork()).'</p>';
        $html .= '<ul>';
        $html .= '<li>Formation : '.ucfirst($var->getTitleFormation1()).'</li>';
        $html .= '<li>contenu de la formation : '.ucfirst($var->getFormation1()).'</li>';
        $html .= '<li>Formation : '.ucfirst($var->getTitleFormation2()).'</li>';
        $html .= '<li>contenu de la formation : '.ucfirst($var->getFormation2()).'</li>';
        $html .= '<li>Experience : '.ucfirst($var->getTitleExperience1()).'</li>';
        $html .= '<li>Qu\'avez vous effectuez durant cette expérience ? : '.ucfirst($var->getExperience1()).'</li>';
        $html .= '<li>Experience : '.ucfirst($var->getTitleExperience2()).'</li>';
        $html .= '<li>Qu\'avez vous effectuez durant cette expérience ? : '.ucfirst($var->getExperience2()).'</li>';
        $html .= '<p>Informations complémentaires : '.$var->getInformations().'</p>';
        $html .= '<li></li>';
        $html .= '</div>';
        $html .= '</div>';
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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCvUser()
    {
        return $this->cv_user;
    }

    /**
     * @param mixed $cv_user
     */
    public function setCvUser($cv_user)
    {
        $this->cv_user = $cv_user;
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
    public function setCategory($category)
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
    public function setStudy($study)
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
    public function setExperience($experience)
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
    public function setWork($work)
    {
        $this->work = $work;
    }

    /**
     * @return mixed
     */
    public function getTitleFormation1()
    {
        return $this->title_formation1;
    }

    /**
     * @param mixed $title_formation1
     */
    public function setTitleFormation1($title_formation1)
    {
        $this->title_formation1 = $title_formation1;
    }

    /**
     * @return mixed
     */
    public function getFormation1()
    {
        return $this->formation1;
    }

    /**
     * @param mixed $formation1
     */
    public function setFormation1($formation1)
    {
        $this->formation1 = $formation1;
    }

    /**
     * @return mixed
     */
    public function getTitleFormation2()
    {
        return $this->title_formation2;
    }

    /**
     * @param mixed $title_formation2
     */
    public function setTitleFormation2($title_formation2)
    {
        $this->title_formation2 = $title_formation2;
    }

    /**
     * @return mixed
     */
    public function getFormation2()
    {
        return $this->formation2;
    }

    /**
     * @param mixed $formation2
     */
    public function setFormation2($formation2)
    {
        $this->formation2 = $formation2;
    }

    /**
     * @return mixed
     */
    public function getTitleExperience1()
    {
        return $this->title_experience1;
    }

    /**
     * @param mixed $title_experience1
     */
    public function setTitleExperience1($title_experience1)
    {
        $this->title_experience1 = $title_experience1;
    }

    /**
     * @return mixed
     */
    public function getExperience1()
    {
        return $this->experience1;
    }

    /**
     * @param mixed $experience1
     */
    public function setExperience1($experience1)
    {
        $this->experience1 = $experience1;
    }

    /**
     * @return mixed
     */
    public function getTitleExperience2()
    {
        return $this->title_experience2;
    }

    /**
     * @param mixed $title_experience2
     */
    public function setTitleExperience2($title_experience2)
    {
        $this->title_experience2 = $title_experience2;
    }

    /**
     * @return mixed
     */
    public function getExperience2()
    {
        return $this->experience2;
    }

    /**
     * @param mixed $experience2
     */
    public function setExperience2($experience2)
    {
        $this->experience2 = $experience2;
    }

    /**
     * @return mixed
     */
    public function getInformations()
    {
        return $this->informations;
    }

    /**
     * @param mixed $informations
     */
    public function setInformations($informations)
    {
        $this->informations = $informations;
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

    /**
     * @return mixed
     */
    public function getModifiedAt()
    {
        return $this->modified_at;
    }

    /**
     * @param mixed $modified_at
     */
    public function setModifiedAt($modified_at)
    {
        $this->modified_at = $modified_at;
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
