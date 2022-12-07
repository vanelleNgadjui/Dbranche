<!-- inclure en haut de l'index.php -->
<?php include('gestion_des_donnees.php'); ?>


<!-- Inclure dans la partie formulaire -->
<form action="gestion_des_donnees.php" method="post" enctype="multipart/form-data">
    <label for="name">Nom</label>
    <input type="text" name='name' value="<?php echo $name; ?>" placeholder='DUPONT' required />
    <label for="prenom">Prenom</label>
    <input type="text" name='prenom' value="<?php echo $prenom; ?>" placeholder='Alice' required />
    <label for="email">Adresse mail</label>
    <input type="email" name='email' value="<?php echo $email; ?>" placeholder='exemple@gmail.com' required />
    </div>
    <div class="formRow">
        <label for="poste">Poste</label>
        <input type="text" name='poste' value="<?php echo $poste; ?>" placeholder='Manager' required />
        <label for="entreprise">Entreprise</label>
        <input type="text" name='entreprise' value="<?php echo $entreprise; ?>" placeholder='Engie' required />
    </div>
    </div>

    <button class="btn" type="submit" name="add-users" ><a href="#">M'inscrire</a></button>
</form>


 