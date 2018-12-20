 <?php
  include("template/header.php")
 ?>         
                  
            <form action="connexion.php" method="post" class="my-4 ml-4">

            <p>
                <label for="admin_name">Nom :</label><br>
                <input id="admin_name" type="text" name="admin_name" placeholder="Ex: Boris Eltsine" required>
            </p>
            
            <p>
                <label for="admin_pass">Mot de passe :</label><br>
                <input id="admin_pass" type="password" name="admin_pass" required>
            </p>

            <p>
                <input type="submit" name="admin_inscription" value="Envoyer">
            </p>

            </form>


            <p class="ml-4"><?php echo $message ?></p>

<?php
  include("template/footer.php")
 ?>