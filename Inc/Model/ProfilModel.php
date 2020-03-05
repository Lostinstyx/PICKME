<?php


namespace Inc\Model;


class ProfilModel
{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $telephone;
    private $street;
    private $postalcode;
    private $city;
    private $siret;
    private $password;
    private $token;
    private $role;
    private $created_at;
    private $modified_at;


    public function ProfilName($var)
    {
        $html ='<body class="bodyProfil">';
        $html .= '<div class="wrapProfil">';
        $html .= '<h2 class="profil_title">Voici vos informations '.ucfirst($var->getName()).'<h2>';


        return $html;
    }

    public function ProfilInformations($var)
    {
        $html  = '<div class="infoProfil">';
        $html .= '<div class="container_Profilpicture">';
        $html .= '<img src="assets/img/Profilpicture.png" alt="votre photo">';
        $html .= '</div>';
        $html .= '<div class="container_informationProfil">';
        $html .= '<p class="ProfilInf">Prenom : '.$var->getName().'</p>';
        $html .= '<p class="ProfilInf">Nom : '.$var->getSurname().'</p>';
        $html .= '<p class="ProfilInf">Email : '.$var->getEmail().'</p>';
        $html .= '<p class="ProfilInf">Téléphone : '.$var->getTelephone().'</p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="clear"></div>';
        $html .= '</body>';

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
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
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * @param mixed $postalcode
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * @param mixed $siret
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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





}
