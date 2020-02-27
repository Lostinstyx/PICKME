<?php
session_start();

require_once('Inc/header.php'); ?>

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
                    <p class="bold">Quisque quis ex mattis, euismod mauris lorem ipsum eget, scelerisque sapien.</p>
                    <p>Quisque quis ex mattis, euismod mauris eget, scelerisque sapien. Curabitur et mattis ante.
                        Maecenas sit
                        amet commodo tellus. Phasellus fermentum pretium eros, ut faucibus velit auctor eget. </p>
                    <p>Vestibulum semper pharetra. Curabitur cursus sapien sed porta dapibus.
                        Lorem ipsum – dolor quis ex mattis, euismod mauris eget, scelerisque sapien. Quisque semper
                        malesuada
                        ipsum! Curabitur et mattis ante. Maecenas sit amet commodo tellus.</p>
                    <p>Quisque lorem <strong>12 YEARS</strong> quis efficitur felis. Duis pharetra <strong>86
                            CLIENTS</strong>
                        for amet ultricies augue, nec rhoncus felis <strong>7 AWARDS</strong> sagittis nec.</p>
                </div>
                <div class="history_buttons">
                    <div class="contact">
                        <a class="ctct_btn" href="#">Contactez nous</a>
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
                    <p>Curabitur et mattis ante. Maecenas sit amet commodo tellus. Phasellus fermentum pretium eros, ut
                        faucibus
                        velit auctor eget dolor sit amet! Lorem dolor sit glavrida amet.</p>
                    <div class="principles_1">
                        <p class="bold">Ceci est un principe fondamental de l'entreprise</p>
                        <p>Nous pronons le lorem ipsum dolor sit amet avant le Pulvinar dapibus</p>
                    </div>
                    <div class="principles_2">
                        <p class="bold">Ceci est un second principe de l'entreprise</p>
                        <p>Nous pronons le lorem ipsum dolor sit amet avant le Pulvinar dapibus</p>
                    </div>
                    <div class="principles_3">
                        <p class="bold">Ceci est un troisième principe de l'entreprise</p>
                        <p>Nous pronons le lorem ipsum dolor sit amet avant le Pulvinar dapibus</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="clear"></div>

        <section class="third_block">
            <div class="block_conf">
                <div class="desc_title">
                    <h2 class="title_block">Titre a trouver</h2>
                </div>
                <div class="trait2"></div>
                <div class="conf_desc">
                    <div class="progBar">

                        <p>Vestibulum semper pharetra. Curabitur cursus sapien sed porta dapibus.
                            Lorem ipsum – dolor quis ex mattis, euismod mauris eget, scelerisque sapien. Quisque semper
                            malesuada
                            ipsum!</p>

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