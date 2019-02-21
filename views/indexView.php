<?php
  include("template/header.php")
 ?>
 
  <!-- Header -->
<div class="navbar-responsive">
  <nav>
    <ul>
      <li><a class="scroll" href="#work">Réalisations</a></li>
      <li><a class="scroll" href="#school">Scolarité / Formations</a></li>
      <li><a class="scroll" href="#about">A propos</a></li>
      <li><a class="scroll" href="#contact">Contact</a></li>

    </ul>
  </nav>
</div>
<header>
  <div class="container">
    <div class="logonavbar row">
      <div class="logo col-9 col-lg-4">
        <h1>JEAN-CHARLES <span>Graillot</span></h1>
        <hr>
        <h2>Graphisme, Développement Web</h2>
      </div>
      <div class="navbar col-3 col-lg-8">
        <nav class="d-none d-lg-block">
          <ul>
            <li><a class="scroll hvr-underline-from-left" href="#work">Réalisations</a></li>
            <li><a class="scroll hvr-underline-from-left" href="#school">Scolarité / Formations</a></li>
            <li><a class="scroll hvr-underline-from-left" href="#about">A propos</a></li>
            <li><a class="scroll hvr-underline-from-left" href="#contact">Contact</a></li>
          </ul>
        </nav>
        <nav class="d-lg-none">
          <ul>
            <li><a href="#"><img class="menu" src="../assets/img/site/menu.svg" alt="menu.svg"></a></li>
          </ul>
        </nav>

      </div>


    </div>
    <h1 class="catchphrase">développeur web junior</h1>
    <a class="scroll down-arrow" href="#work"><img src="../assets/img/site/down-arrow.svg" alt="down-arrow.svg"></a>

  </div>
</header>



<!-- Mes réalisations -->
<section class="work" id="work">
  <div class="container">
    <h2>Mes réalisations</h2>
    <hr>
    <p>Une sélection de quelques créations</p>

<div id="projectsSort">
    <form id="formtest" class="getProjectsByCategory text-center mb-5">
      <select class="" name="category" required onchange='rewrite(this.value)'>
        <option value="" disabled selected>Choisissez le type de projet</option>
        <option value="Development">Développement</option>
        <option value="Design">Design</option>
      </select>
      <input class="search form-control col-12 d-none" id="searchbar" placeholder="Rechercher"/>
    </form>
   
   <div class="list">
    <?php 
    foreach ($projects as $project) 
    {
    ?>

    <div data-aos="zoom-in" class="works-content col-12 col-md-12 row mx-auto">
        <div class="works-img col-12 col-md-6">
            <img class="img-thumbnail" src="<?php echo $project->getImage(); ?>" alt="<?php echo $project->getAlt(); ?>">
        </div>
        <div class="works-details col-12 col-md-6">
          <h4><?php echo $project->getTitle(); ?></h4>
          <p class="sortCategory"><?= $project->getCategory() ?></p>
          <p><?php echo $project->getDescription(); ?></p>
          <div><a href="<?php echo $project->getLink(); ?>">Aller sur le site</a></div>
        </div>
    </div>

    <hr class="works-separator">
    
    <?php
    }
    ?>

    </div>
</div>

      <div class="lienGithub works-details col-12 row mx-auto">
        <a class="mx-auto" href="https://github.com/jeancharlesgraillot?tab=repositories">Lien vers mes travaux sur github</a>
      </div>

  </div>
</section>


<!-- Mes scolarité, formation-->
<section class="school" id="school">
  <div class="container">
    <h2>Scolarité / Formations</h2>
    <hr>
    <div class="row">
      <div class="school-part col-12 my-3">
        <article>
          <div class="period">2018 / 2019</div>
          <h3>Institut Vitamine T / Simplon</h3>
          <p class="my-0">Formation de Développeur Web</p>
        </article>
      </div>

      <div class="three-points my-0">
        <i class="fas fa-circle"></i>
        <i class="fas fa-circle"></i>
        <i class="fas fa-circle my-0"></i>
      </div>

      <div class="school-part col-12 my-3">
        <article>
          <div class="period">2016 / 2017</div>
          <h3>M2I Villeneuve d'Ascq</h3>
          <p class="my-0">Formation de Web Designer</p>
        </article>
      </div>

      <div class="three-points my-0">
        <i class="fas fa-circle"></i>
        <i class="fas fa-circle"></i>
        <i class="fas fa-circle my-0"></i>
      </div>

      <div class="school-part col-12 my-3">
        <article>
          <div class="period">2011 / 2012</div>
          <h3>AFPA Rousies</h3>
          <p class="my-0">Formation de Conseiller en Insertion Professionnelle</p>
        </article>
      </div>

      <div class="three-points my-0">
        <i class="fas fa-circle"></i>
        <i class="fas fa-circle"></i>
        <i class="fas fa-circle my-0"></i>
      </div>

      <div class="school-part col-12 my-3">
        <article>
          <div class="period">2007</div>
          <h3>Université de Lille 2</h3>
          <p class="my-0">Licence de Droit</p>
        </article>
      </div>

      <div class="three-points my-0">
        <i class="fas fa-circle"></i>
        <i class="fas fa-circle"></i>
        <i class="fas fa-circle my-0"></i>
      </div>

      <div class="school-part col-12 my-3">
        <article>
          <div class="period">2000</div>
          <h3>Institut de Genech</h3>
          <p class="my-0">BAC Science et Technologie du Produit Agroalimentaire</p>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- A Propos -->
<section class="about" id="about">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <h2 class="text-lg-left">A propos</h2>
        <hr class="mx-lg-0">
        <h3 class="text-center text-md-left"><strong>JEAN-CHARLES Graillot</strong>, Développeur Web Junior</h3>
        <p class="text-justify">Issu d'une formation de Web Designer chez M2I qui s'est terminée en Juin 2017, je me suis découvert une forte affinité avec le développement web. Depuis, je me suis autoformé et j'ai récemment pu intégrer une formation de développeur web avec Simplon / Vitamine T qui a débuté en Juin dernier.</p>
        <ul>

          <li>E-mail: <a href="mailto:graillot.jc@gmail.com">graillot.jc@gmail.com</a></li>

        </ul>
        <div class="social-networks text-lg-left">

          <a href="https://www.linkedin.com/in/jean-charles-graillot-2b2a82136/" target="_blank"><img src="../assets/img/site/linkedin.svg" alt="linkedin.svg"></a><!--
          --><a href="https://www.behance.net/graillotjc20fb" target="_blank"><img src="../assets/img/site/behance.svg" alt="behance.svg"></a><!--
          --><a href="https://www.youtube.com/channel/UCk-emJ-wIvvDWBhjncLXjsA" target="_blank"><img src="../assets/img/site/youtube.svg" alt="youtube.svg"></a>
        </div>
      </div>
      <div class="col-12 d-none col-lg-6 d-lg-block">
        <img class="picture" src="../assets/img/site/photo.jpg" alt="photo.jpg">
      </div>
    </div>
  </div>
</section>

<section class="contact" id="contact">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Contactez-moi</h2>
        <hr>

        <p>* Ces champs sont obligatoires</p>

        <form class="contactForm text-center" action="index.php" method="post">
          <div>
              <label for="name">Nom *</label>
              <input required type="text" id="name" name="user_name">
          </div>
          <div>
              <label for="mail">E-mail *</label>
              <input required type="email" id="mail" name="user_email">
          </div>
          <div>
              <label for="telephone">Téléphone </label>
              <input class="input" id="telephone" name="user_telephone" type="tel">
          </div>
          <div class="last-input">
              <label for="msg">Message *</label>
              <textarea required id="msg" name="user_message"></textarea>
          </div>
          <div class="message"><?php echo $message; ?></div>
          <div class="button">
              <button type="submit" name="contact">Envoyer le message</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->

<footer>
  <div class="container">
    <p>Copyright JEAN-CHARLES Graillot - All Rights reserved</p>
    <ul>
      <li><a href="https://www.linkedin.com/in/jean-charles-graillot-2b2a82136/" target="_blank">Linkedin | </a></li>
      <li><a href="https://www.behance.net/graillotjc20fb" target="_blank">Behance | </a></li>
      <li><a href="https://www.youtube.com/channel/UCk-emJ-wIvvDWBhjncLXjsA" target="_blank">Youtube</a></li>
    </ul>
  </div>
</footer>


<?php
  include("template/footer.php")
 ?>




<script>
    function rewrite(sort) {
      let test = sort.slice();
      let inputSearch = document.getElementById('searchbar');
      inputSearch.value = '';
      for (let index = 0; index < test.length; index++) {
        inputSearch.value = inputSearch.value + test[index]; 
      }
      inputSearch.select();
      inputSearch.dispatchEvent(new KeyboardEvent('keyup', {'key':'y'}));
      // window.event.keyCode = 37;
    }
</script>
<script>
var options = {
  valueNames: [ 'sortCategory' ]
};

var userList = new List('projectsSort', options);
</script>