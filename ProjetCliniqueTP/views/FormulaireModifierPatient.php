
<form method="POST" action="PatientController.php?action=modifierPatient">
    <table>
    <tr>
            <td>
                <label>noDossier</label>
            </td>
            <td>
                <input class="inputreadonly" name="noDossier" value="<?php echo $patient->getNoDossier()?>" required readonly/>
            </td>
        </tr>
        <tr>
            <td>
                <label>noAssuranceMaladie</label>
            </td>
            <td>
                <input name="noAssuranceMaladie" value="<?php echo $patient->getNoAssuranceMaladie()?>" required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Nom</label>
            </td>
            <td>
                <input name="nom" value="<?php echo $patient->getNom()?>" required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Prenom</label>
            </td>
            <td>
                <input name="prenom" value="<?php echo $patient->getPrenom()?>" required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Adresse</label>
            </td>
            <td>
                <input name="adresse" value="<?php echo $patient->getAdresse()?>" required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Ville</label>
            </td>
            <td>
                <input name="ville" value="<?php echo $patient->getVille()?>" required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Province</label>
            </td>
            <td>
                <input name="province" value="<?php echo $patient->getProvince()?>" required  />
            </td>
        </tr>
        <tr>
            <td>
                <label>CodePostal</label>
            </td>
            <td>
                <input name="codePostal" value="<?php echo $patient->getCodePostal()?>" required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Telephone</label>
            </td>
            <td>
                <input name="telephone"  value="<?php echo $patient->getTelephone()?>" required />
            </td>
        </tr>
        <tr>
            <td>
                <label>Courriel</label>
            </td>
            <td>
                <input name="courriel" value="<?php echo $patient->getCourriel()?>" required />
            </td>
        </tr>      <tr>
            <td>
                <label>nomClinique</label>
            </td>
            <td>
                <input name="nomClinique" value="<?php echo $nomClinique?>"  required />
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
            <input type="submit" value="Modifier" style="width:100px"/>
            </td>
        </tr>
    </table>
</form>
