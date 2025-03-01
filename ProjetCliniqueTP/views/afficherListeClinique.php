<h3>Liste des clinique(s) (<?php echo count($listeClinique); ?> Cliniques(s)) :</h3>
<br />
<table>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Province</th>
            <th>Code Postal</th>
            <th>Téléphone</th>
            <th>Courriel</th>
		</tr>
        <!--Formulaire pour la modification et la suppression de cliniques... -->
        <form method="">
            <?php
                foreach ($listeClinique as $clinique) 
                {
                    echo "<tr>";
                    echo "<td>" . $clinique->getNom() . "</td>";
                    echo "<td>" . $clinique->getAdresse() . "</td>";
                    echo "<td>" . $clinique->getVille() . "</td>";
                    echo "<td>" . $clinique->getProvince() . "</td>";
                    echo "<td>" . $clinique->getCodePostal() . "</td>";
                    echo "<td>" . $clinique->getTelephone() . "</td>";
                    echo "<td>" . $clinique->getCourriel() . "</td>";
                    echo '<td><input value="Modifier" onclick="document.getElementById(\'nomClinique\').value =\'' . $clinique->getNom() . '\'; this.form.action=\'CliniqueController.php\'; this.form.method=\'GET\'; submit();" type="button"></td>';
                    echo '<td><input value="Supprimer" type="button" onclick="if (confirm(\'Voulez-vous vraiment supprimer la clinique : ' .  $clinique->getNom() . '\')) { document.getElementById(\'nomClinique\').value = \'' . $clinique->getNom() . '\'; this.form.action =\'CliniqueController.php?action=supprimerClinique\'; this.form.method = \'POST\'; submit();}"></td>';
                    echo "</tr>";
                }
            ?>
			<input type="hidden" id="action" name="action" value="formulaireModifierClinique">
            <input type="hidden" id="nomClinique" name="nomClinique">
        </form>
</table>
<br>
<b>Ajouter une clinique : </b>
<br>
<br>
<!--Formulaire pour l'ajout de clinques... -->
<form method="POST" action="CliniqueController.php?action=ajouterClinique">
    <table>
        <tr>
            <td>
                <label>Nom</label>
            </td>
            <td>
                <input name="nom" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Adresse</label>
            </td>
            <td>
                <input name="adresse" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Ville</label>
            </td>
            <td>
                <input name="ville" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Province</label>
            </td>
            <td>
                <input name="province" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>CodePostal</label>
            </td>
            <td>
                <input name="codePostal" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Telephone</label>
            </td>
            <td>
                <input name="telephone" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Courriel</label>
            </td>
            <td>
                <input name="courriel" required/>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
            <input type="submit" value="Ajouter" style="width:100px"/>
            </td>
        </tr>
    </table>
</form>