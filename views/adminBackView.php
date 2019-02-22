<?php
  include("template/header.php")
 ?>

 <nav class="navbar navbar-expand-lg navbar-light bg-light py-4 border-bottom border-danger">
  <a class="navbar-brand" href="#">Backoffice</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#contacts">Contacts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#projects">Projets</a>
      </li>
    </ul>
    <form action="deconnexion.php" method="post">
        <input type="submit" name="deconnexion" value="Deconnexion" class="btn btn-primary">
    </form>
  </div>
</nav>

<div class="ml-5 mr-5">

  <h2 id="contacts" class="ml-3 my-5"><em>Contacts</em></h2>

  <div class="col-12 mx-auto mt-4">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Email</th>
          <th scope="col">Telephone</th>
          <th scope="col">Message</th>
        </tr>
      </thead>
      <tbody id="usersInfos">
      <?php

        foreach ($users as $user)
        {
        ?>

        <tr>
            <td><?php echo $user->getUser_name(); ?></td>
            <td><?php echo $user->getUser_email(); ?></td>
            <td><?php echo $user->getUser_telephone(); ?></td>
            <td><?php echo $user->getUser_message(); ?></td>
            <td>
              <form class="delete" action="adminBack.php" method="post">
                <input type="hidden" name="idContact" value="<?php echo $user->getId(); ?>"  required>
                <input type="submit" name="deleteContact" value="Delete">
              </form>
            </td>
        </tr>

        <?php
        }
        ?>
      </tbody>
    </table>

  </div>


  <h2 id="projects" class="ml-3 my-5"><em>Projets</em></h2>

  <div class="col-12 mx-auto mt-4">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Titre</th>
          <th scope="col">Description</th>
          <th scope="col">Lien</th>
          <th scope="col">Image</th>
          <th scope="col">Alt</th>
          <th scope="col">Catégorie</th>
        </tr>
      </thead>
      <tbody id="projectsInfos">
      <?php

        foreach ($projects as $project)
        {
        ?>

        <tr>
            <td><?php echo $project->getTitle(); ?></td>
            <td><?php echo $project->getDescription(); ?></td>
            <td><?php echo $project->getLink(); ?></td>
            <td><?php echo $project->getImage(); ?></td>
            <td><?php echo $project->getAlt(); ?></td>
            <td><?php echo $project->getCategory(); ?></td>
            <td>
              <form class="delete" action="adminBack.php" method="post">
                <input type="hidden" name="idProjectDelete" value="<?php echo $project->getId(); ?>"  required>
                <input type="submit" name="deleteProject" value="Delete">
              </form>
            </td>
            <td>
              <form class="update" action="adminBack.php#projects" method="post">
                <input type="hidden" name="idProjectUpdate" value="<?php echo $project->getId(); ?>"  required>
                <input type="submit" name="updateProject" value="Update">
              </form>
            </td>
        </tr>

        <?php
        }
        ?>
      </tbody>
    </table>

  </div>

  <div class="row d-flex">

    <div class="col-6">

      <h3 class="ml-3 my-5 text-success">Ajout</h3>

      <form class="ml-3" action="adminBack.php#projects" method="post" enctype="multipart/form-data">
        <p class="">
            <input class="" type="text" name="title" placeholder="Titre" required>
        </p>
        <p class="">
            <input class="" type="text" name="link" placeholder="Lien" required>
        </p>
        <p class="">
          <textarea class="" name="description" placeholder="Description" cols="30" rows="5" required></textarea>
        </p>
        <p class="">
          <select name="category" required>
            <option value="" disabled>Catégorie</option>
            <option value="Development">Développement</option>
            <option value="Design">Design</option>
        </select>
        </p>
        <p class="">
            <input type="file" name="image" id="image" required>
        </p>
        <p class="">
            <input type="text" name="alt" placeholder="Alt" required>
        </p>
        <p class="">
            <input class="" type="submit" name="addProject" value="Envoyer">
        </p>
      </form>
      <p><?php echo $message ?></p>

    </div>

    <div class="col-6">

      <h3 class="ml-3 my-5 text-success">Mise à jour</h3>

      <form class="ml-3" action="adminBack.php#projects" method="post" enctype="multipart/form-data">
        <p class="">
            <input class="" type="text" name="titleUpdate" placeholder="<?php $projectToUpdate->getTitle(); ?>" required>
        </p>
        <p class="">
            <input class="" type="text" name="linkUpdate" placeholder="<?php $projectToUpdate->getLink(); ?>" required>
        </p>
        <p class="">
          <textarea class="" name="descriptionUpdate" placeholder="<?php $projectToUpdate->getDescription(); ?>" cols="30" rows="5" required></textarea>
        </p>
        <p class="">
          <select name="categoryUpdate" required>
            <option value="" disabled>Catégorie</option>
            <option value="Development">Développement</option>
            <option value="Design">Design</option>
        </select>
        </p>
        <p class="">
            <input type="file" name="imageUpdate" id="image" required>
        </p>
        <p class="">
            <input type="text" name="altUpdate" placeholder="<?php $projectToUpdate->getAlt(); ?>" required>
        </p>
        <p class="">
            <input class="" type="submit" name="updateProjectSend" value="Envoyer">
        </p>
      </form>
      <p><?php echo $message ?></p>
      
    </div>

  </div>

  

</div>
<?php
  include("template/footer.php")
 ?>