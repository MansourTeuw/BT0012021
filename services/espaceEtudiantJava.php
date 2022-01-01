<?php 
 session_start();
 require("../database/db.php");

 if (isset($_SESSION['user_id'])) {
     header("Location: index.php");
 }

require('headerServices.php');



?>

 <!-- SHOWCASE start  -->
 <section class="showcase-java">
        <div class="w3-container w3-center">
            <h1 class="w3-text-shadow w3-animate-opacity" id="python">Maitriser Le Java</h1>
            <hr>
            <p class="w3-animate-opacity">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque recusandae est amet, porro saepe odit, quos nemo aliquid laboriosam nam nobis impedit blanditiis iste dolores minima. Consequuntur iure repudiandae numquam.</p>
            <button class="w3-button w3-red w3-large w3-opacity">Start Here</button>
        </div>
    </section>
    <!-- SHOWCASE end  -->


    <!-- section1 start  -->

    <section class="section w3-red w3-hover-opacity">
        <div class="w3-container w3-center">
            <i class="fa fa-home"></i>
            <h2>Bienvenue | Java</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum iste ad cupiditate mollitia! Eveniet accusamus odio, est corporis suscipit facere quae rerum optio labore deserunt illum voluptate dignissimos id ullam!</p>
        </div>
    </section>
    <!-- section1 end  -->


    <!-- les formations  -->
    <div class="card-container w3-mobile">
    <div class="w3-container w3-mobile">
    <div class="w3-card-8 w3-dark-grey w3-mobile">
        <div class="w3-container w3-center w3-mobile">
            <h3>Springboot</h3>
            <img class="card-img w3-hover-opacity w3-mobile" src="images/springboot.png" alt="PHP-basics">
            <h5>Java</h5>

            <button class="w3-btn w3-green w3-mobile">Commencer</button>
            <button class="w3-btn w3-red w3-mobile">Sauvegarder</button>
        </div>
    </div>
    </div>

    <div class="w3-container w3-mobile">
    <div class="w3-card-8 w3-dark-grey w3-mobile">
        <div class="w3-container w3-center w3-mobile">
            <h3>Java et Vaadin</h3>
            <img class="card-img w3-mobile" src="images/vaadin.png" alt="PHP-basics">
            <h5>Java</h5>

            <button class="w3-btn w3-green w3-mobile">Commencer</button>
            <button class="w3-btn w3-red w3-mobile">Sauvegarder</button>
        </div>
    </div>
    </div>

    <div class="w3-container w3-mobile">
    <div class="w3-card-8 w3-dark-grey w3-mobile">
        <div class="w3-container w3-center w3-mobile">
            <h3>Java et Android?</h3>
            <img class="card-img w3-mobile" src="images/java-android.jpeg" alt="PHP-basics">
            <h5>Java</h5>

            <button class="w3-btn w3-green w3-mobile">Commencer</button>
            <button class="w3-btn w3-red w3-mobile">Sauvegarder</button>
        </div>
    </div>
    </div>
    </div>













<?php require('../footer.php'); ?>
