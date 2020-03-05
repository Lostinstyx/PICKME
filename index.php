<?php
session_start();

spl_autoload_register();

use \Inc\Service\Form;
use \Inc\Service\Tool;
use \Inc\Service\Validation;
use \Inc\Repository\ArticleRepository;
use \Inc\Repository\ContactRepository;
use \Inc\Repository\CvRepository;
use \Inc\Repository\ResearchCvRepository;
use \Inc\Repository\StatusRepository;

require_once ('Inc/function/functions.php');
require_once('Inc/header.php');
?>

    <div class="flexslider flex1">
        <ul class="slides">
            <li>
                <img src="assets/img/teamwork_bg.jpg"/>
            </li>
            <li>
                <img src="assets/img/teamwork_bg1.jpg"/>
            </li>
        </ul>
    </div>


    <div class="title">
        <h2 class="h2-title">
            Je suis un titre
        </h2>
        <hr/>
        <p class="undertitle">
            Je suis un texte
        </p>
    </div>
    </div>

    <div class="wrap_section">
        <section class="first_block">
            <div class="block_history">
                <div class="history_title">
                    <h2 class="title_block">Notre Histoire</h2>
                </div>
                <div class="line"></div>
                <div class="desc">
                    <p>Rechercher (et trouver) un emploi, créer un CV, écrire une lettre de motivation, trois activités inspirant l’angoisse. Les fondateurs de Pick Me, comme tout un chacun, ont eux aussi été confrontés à ce parcours du combattant, à ces difficultés, et c’est de leur expérience personnelle que leur est venue une idée simple : rendre la création d’un CV plus facile, plus simple, plus efficace, et pourquoi pas, amusante !</p>
                    <p>Crée en 2019, la petite entreprise Pick Me s’est rapidement développée : le bouche à oreille, les partages sur les réseaux sociaux, les retours positifs, et surtout, les succès dans la recherche d’emploi, ont permis à la petite pousse de devenir grande, et d’être aujourd’hui un des leaders du marché.</p>
                    <p>Alors n’hésitez plus, ne marchez plus à reculons devant l’angoissant CV, rejoignez-nous, laissez-nous vous aidez !
                    </p>
                </div>
                <div class="history_buttons">
                    <div class="contact">
                        <a class="ctct_btn" href="contact.php">Contactez nous</a>
                    </div>
                </div>
            </div>
            <div class="our_local">
                <img class="local"
                     src="https://www.affiches-parisiennes.com/content/images/2018/04/03/7844/workspaceanowystylgroup.jpg"
                     alt="bureau">
            </div>

            <div class="clear"></div>
        </section>

        <section class="second_block">
            <div class="block_principles">
                <img class="principles"
                     src="https://www.affiches-parisiennes.com/content/images/2018/04/03/7844/workspaceanowystylgroup.jpg"
                     alt="principes">
            </div>
            <div class="principles_desc">
                <div class="desc_title">

                    <h2 id="h2_offset" class="title_block">Nos principes</h2>

                </div>
                <div class="trait"></div>
                <div class="desc">
                    <p>Notre principe premier, c’est que chez Pick Me, on pick tout le monde ! Tout individu ayant à cœur de travailler à sa recherche d’emploi est le bienvenu. Quelque soit votre parcours, vos besoins, vos envies, nous saurons vous accompagner avec respect, compréhension, professionnalisme et bienveillance.</p>
                    <p>Toujours à la page concernant les demandes des professionnels en matière de CV, nous saurons vous conseiller au mieux. Notre équipe fait un énorme travail de documentation et de veille pour vous proposer un service de qualité.</p>

                </div>
            </div>
        </section>
        <div class="clear"></div>

        <section class="third_block">
            <div class="block_conf">
                <div class="desc_title">
                    <h2 class="title_block">Nos résultats</h2>
                </div>
                <div class="trait2"></div>
                <div class="conf_desc">
                    <div class="progBar">

                        <p>Depuis notre création, nos résultats ne font que progresser, en voici quelques exemples :</p>

                        <p class="bold"> Utilisateurs ayant trouvé un emploi suite à l'utilisation de PickMe :</p>
                        <div class="progress-wrap progress" data-progress-percent="85">
                            <div class="progress-bar progress"></div><div class="percents" id="percents">0</div>
                        </div>

                        <p class="bold"> Taux de satisfaction des entreprises utilisant notre plateforme :</p>
                        <div class="progress-wrap progress" data-progress="85">
                            <div class="progress-bar progress" ></div><div class="percents" id="percents">85%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="img_cv">
                <img class="image_CV"
                     src="https://www.affiches-parisiennes.com/content/images/2018/04/03/7844/workspaceanowystylgroup.jpg"
                     alt="bureau">
            </div>
        </section>
        <div class="clear"></div>
    </div>


<?php require_once('Inc/footer.php');