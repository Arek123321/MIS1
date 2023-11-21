<div id="contenu">
      <form action="index.php?uc=fraisVisiteur&action=voir1e" method="post">
      <div class="corpsForm">
      <h2>Saisie</h2>
      <p>
        <label for="num" accesskey="n">Numéro: </label>
        <select id="num" name="numero">
            <?php
			foreach ($visiteurs as $unVisiteur)
			{
				?>
				<option selected value="<?php echo $unVisiteur['id'] ?>"><?php echo  $unVisiteur['id'] ?> </option>
				<?php 
				}
           
		   ?>    
        </select>

      </p>
      <p> 
            <label for="mois" accesskey="n">Mois (2 chiffres): </label>
            <input type="text" id="mois" name="mois"></input>

            <label for="an" accesskey="n">Annee (4 chiffres): </label>
            <input type="text" id="an" name="an"></input>
      </p>
      <p>
        <h2>Frais Forfait</h2> </n>
        <label for="rp" accesskey="n">Repas Midi: </label>
            <input type="text" id="rp" name="rp"></input>

            
      </p>
      <p>
      <label for="nu" accesskey="n">Nuitees: </label>
            <input type="text" id="nu" name="nu"></input>

      </p>
      <p>
      <label for="et" accesskey="n">Etape: </label>
            <input type="text" id="et" name="et"></input>

      </p>
      <p>
      <label for="km" accesskey="n">KM: </label>
            <input type="text" id="km" name="km"></input>

      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
  
      </p> 
      </div>
        
      </form>
  