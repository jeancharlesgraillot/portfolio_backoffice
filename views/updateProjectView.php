<?php
  include("template/header.php")
?>

    

<h3 class="ml-3 my-5 text-success">Mise à jour</h3>

<form class="ml-3" action="updateProject.php?id=<?php echo $projectToUpdate->getId(); ?>" method="post" enctype="multipart/form-data">
<p class="">
    <input class="" type="text" name="titleUpdate" value="<?php echo $projectToUpdate->getTitle(); ?>" required>
</p>
<p class="">
    <input class="" type="text" name="linkUpdate" value="<?php echo $projectToUpdate->getLink(); ?>"  required>
</p>
<p class=""> 
    <textarea class="" name="descriptionUpdate" cols="30" rows="5" required><?php echo $projectToUpdate->getDescription(); ?></textarea>
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
    <input type="text" name="altUpdate" value="<?php echo $projectToUpdate->getAlt(); ?>"  required>
</p>
<p class="">
    <input class="" type="submit" name="updateProject" value="Envoyer">
</p>
</form>
<p><?php echo $message ?></p>
      
    

<?php
  include("template/footer.php")
?>















