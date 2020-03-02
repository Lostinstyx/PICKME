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
        $html .= '<h2> Nom :'. $this->name.'</h2>';
        $html .= '<p>Pseudo : '. $this->surname .'</p>';
        $html .= '<p>Email : '. $this->email .'</p>';
        $html .= '<p>Téléphone :  '.$this->telephone.'</p>';
        $html .= '<p>Rue : '. $this->street .'</p>';
        $html .= '<p>Code postal : '. $this->postalcode .'</p>';
        $html .= '<p>Ville :  '.$this->city.'</p>';
        $html .= '<p>Siret:  '.$this->siret.'</p>';
        $html .= '<hr />';

        $html .= '</div>';
        return $html;

    }

}
