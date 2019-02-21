<?php
  include("template/header.php")
 ?>
<div class="container my-5 border-bottom border-dark">
  <div class="row">

    <h2 class="col-6 text-center">Backoffice</h2>
  
    <div class="col-6 adminSpace text-center">
        <form action="deconnexion.php" method="post">
          <input type="submit" name="deconnexion" value="Deconnexion" class="btn btn-primary">
        </form>
    </div>

  </div>
</div>


<h2 class="ml-3 my-5"><em>Contacts</em></h2>

<div class="col-12 mx-auto mt-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nom</th>
              <th scope="col">Email</th>
              <th scope="col">Telephone</th>
              <th scope="col">Message</th>
              <th scope="col">delete</th>
              

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
                    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>"  required>
                    <input type="submit" name="delete" value="Delete">
                  </form>
                </td>
            </tr>

            <?php
            }
            ?>
          </tbody>

        </table>
</div>

<h2 class="ml-3 my-5"><em>Projets</em></h2>

<h3 class="ml-3 my-5 text-success">Ajout</h3>

<form class="ml-3" action="adminBack.php" method="post" enctype="multipart/form-data">
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
      <input class="" type="submit" name="submit" value="Envoyer">
  </p>
</form>
<p><?php echo $message ?></p>

<?php
  include("template/footer.php")
 ?>