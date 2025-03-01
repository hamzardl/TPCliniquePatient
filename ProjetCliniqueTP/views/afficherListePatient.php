<h3>Liste des Cegeps  </h3>
<br />
<form method="POST">
    <select onchange="document.getElementById('nomClinique').value = this.value; this.form.action = 'patientController.php'; this.form.submit();">
        <?php 
        // Remplir le <select> avec les cliniques
        for ($i = 0; $i < count($listeClinique); $i++) { 
            // Afficher chaque clinique comme option
            echo "<option value='" . $listeClinique[$i]->getNom() . "' " . 
            ($nomClinique == $listeClinique[$i]->getNom() ? "selected" : "") . ">" . 
            $listeClinique[$i]->getNom() . "</option>";
        }
        ?>
    </select>
    <input type="hidden" id="nomClinique" name="nomClinique">
</form>

<h3>Liste des Patient(s) (<?php echo count($listePatient); ?> Patient(s)) :</h3>
   
<br />
<table> 
        <tr>
            <th>noDossier</th>
            <th>noAssuranceMaladie</th>
            <th>nom</th>
            <th>prenom</th>
            <th>adresse</th>
            <th>ville</th>
            <th>province</th>
            <th>codePostal</th>
            <th>telephone</th>
            <th>courriel</th>
		</tr>
        <!--Formulaire pour la modification et la suppression de cliniques... -->
        <form method="">
    <?php
    foreach ($listePatient as $patientDTO) {
        echo "<tr>";
        echo "<td>" . $patientDTO->getNoDossier() . "</td>";
        echo "<td>" . $patientDTO->getNoAssuranceMaladie() . "</td>";
        echo "<td>" . $patientDTO->getNom() . "</td>";
        echo "<td>" . $patientDTO->getPrenom() . "</td>";
        echo "<td>" . $patientDTO->getAdresse() . "</td>";
        echo "<td>" . $patientDTO->getVille() . "</td>";
        echo "<td>" . $patientDTO->getProvince() . "</td>";
        echo "<td>" . $patientDTO->getCodePostal() . "</td>";
        echo "<td>" . $patientDTO->getTelephone() . "</td>";
        echo "<td>" . $patientDTO->getCourriel() . "</td>";

        // Ici, j'ai utilisé des guillemets simples pour l'attribut value et des guillemets doubles pour onclick
        // Pour éviter les conflits de guillemets
        echo '<td><input value="Modifier" type="button" onclick="document.getElementById(\'noDossier\').value = \'' . $patientDTO->getNoDossier() . '\'; this.form.action=\'patientController.php\'; this.form.method=\'GET\'; this.form.submit();"></td>';
        echo '<td><input value="Supprimer" type="button" onclick="if (confirm(\'Voulez-vous vraiment supprimer le patient : ' .  $patientDTO->getNoDossier() . '\')) { document.getElementById(\'noDossier\').value = \'' . $patientDTO->getNoDossier(). '\'; this.form.action =\'patientController.php?action=supprimerPatient\'; this.form.method = \'POST\'; submit();}"></td>';
        echo "</tr>";
    }
    
    ?>
			<input type="hidden" id="action" name="action" value="formulaireModifierPatient">
            <input type="hidden" id="noDossier" name="noDossier">
            <input type="hidden" id="nomClinique" name="nomClinique" value="<?php echo $nomClinique; ?>" >

            
</form>

       
</table>


<br>
<b>Ajouter un  patient : </b>
<br>
<br>
<!--Formulaire pour l'ajout de clinques... -->
<form method="POST" action="patientController.php?action=ajouterPatient">

    <table>
         <tr>
            <td>
                <label>noDossier</label>
            </td>
            <td>
                <input name="noDossier" required />
            </td>
        </tr>
        <tr>
            <td>
                <label>noAssuranceMaladie</label>
            </td>
            <td>
                <input name="noAssuranceMaladie"  />
            </td>
        </tr>
        <tr>
            <td>
                <label>Nom</label>
            </td>
            <td>
                <input name="nom"  required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Prenom</label>
            </td>
            <td>
                <input name="prenom"  required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Adresse</label>
            </td>
            <td>
                <input name="adresse"  required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Ville</label>
            </td>
            <td>
                <input name="ville" required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Province</label>
            </td>
            <td>
                <input name="province"  required  />
            </td>
        </tr>
        <tr>
            <td>
                <label>CodePostal</label>
            </td>
            <td>
                <input name="codePostal" required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Telephone</label>
            </td>
            <td>
                <input name="telephone"  required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Courriel</label>
            </td>
            <td>
                <input name="courriel"  required />
            </td>
        </tr>      <tr>
            <td>
                <label>nomClinique</label>
            </td>
            <td>
                <input name="nomClinique"  required />
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