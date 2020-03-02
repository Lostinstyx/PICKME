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

    public function __construct($user)
    {
        $this->name = $user['name'];
        $this->surname = $user['surname'];
        $this->email = $user['email'];
        $this->telephone = $user['telephone'];
        $this->street = $user['street'];
        $this->postalcode = $user['postalcode'];
        $this->city = $user['city'];
        $this->siret = $user['siret'];
    }

    public function viewProfil()
    {
        $html = '<div class="profilprofil">';
        $html .= '<h2 id="profilh2"> Nom : '. $this->name.'</h2>';
        $html .= '<p class="profilp"><span> Pseudo : </span>'. $this->surname .'</p>';
        $html .= '<p class="profilp"><span> Email : </span>'. $this->email .'</p>';
        $html .= '<p class="profilp"><span> Téléphone : </span>'.$this->telephone.'</p>';
        $html .= '<p class="profilp"><span> Rue : </span>'. $this->street .'</p>';
        $html .= '<p class="profilp"><span> Code postal : </span>'. $this->postalcode .'</p>';
        $html .= '<p class="profilp"><span> Ville : </span>'.$this->city.'</p>';
        $html .= '<p class="profilp"><span> Siret : </span>'.$this->siret.'</p>';
        $html .= '<hr />';
        $html .= '</div>';
        return $html;

    }

}
