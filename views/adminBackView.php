<?php
  include("template/header.php")
 ?>

<h2 class="text-center mt-3 mb-4 text-center">Backoffice Contacts</h2>

<div class="adminSpace text-center mb-5">
    <form action="deconnexion.php" method="post">
      <input type="submit" name="deconnexion" value="Deconnexion" class="btn btn-primary">
    </form>
</div>
<div class="col-12 mx-auto mt-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">user_name</th>
              <th scope="col">user_email</th>
              <th scope="col">user_telephone</th>
              <th scope="col">user_message</th>
              <th scope="col">add</th>
              <th scope="col">delete</th>
              <th scope="col">update</th>
              

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
                  <form class="add" action="adminBackAdd.php" method="post">
                    <input type="submit" name="add" value="Add">
                  </form>
                </td>
                <td>
                  <form class="delete" action="adminBack.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>"  required>
                    <input type="submit" name="delete" value="Delete">
			 	          </form>
                </td>
                <td>
                  <form class="update" action="adminBackUpdate.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>"  required>
                    <input type="submit" name="update" value="Update">
			 	          </form>
                </td>

            </tr>

            <?php
            }
            ?>
          </tbody>

        </table>


</div>

<?php
  include("template/footer.php")
 ?>