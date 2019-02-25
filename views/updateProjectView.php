<?php
  include("template/header.php")
?>

    

<h3 class="ml-3 my-5 text-success">Mise à jour</h3>

<form class="ml-3" action="adminBack.php" method="post" enctype="multipart/form-data">
<p class="">
    <input class="" type="text" name="titleUpdate" placeholder="<?php echo $projectToUpdate->getTitle(); ?>" required>
</p>
<p class="">
    <input class="" type="text" name="linkUpdate" placeholder="<?php echo $projectToUpdate->getLink(); ?>"  required>
</p>
<p class=""> 
    <textarea class="" name="descriptionUpdate" placeholder="<?php echo $projectToUpdate->getDescription(); ?>" cols="30" rows="5" required></textarea>
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
    <input type="text" name="altUpdate" placeholder="<?php echo $projectToUpdate->getAlt(); ?>"  required>
</p>
<p class="">
    <input class="" type="submit" name="updateProjectSend" value="Envoyer">
</p>
</form>
<p><?php echo $message ?></p>
      
    

<?php
  include("template/footer.php")
?>















