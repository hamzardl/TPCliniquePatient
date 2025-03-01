<br />
<b>Modifier une clinique : </b>
<br />
<br />
<!--Formulaire pour la modification d'une clinique -->
<form method="POST" action="CliniqueController.php?action=modifierClinique">
    <table>
        <tr>
            <td>
                <label>Nom</label>
            </td>
            <td>
                <input name="nom" value="<?php echo $clinique->getNom(); ?>" readonly class="inputreadonly"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Adresse</label>
            </td>
            <td>
                <input name="adresse" value="<?php echo $clinique->getAdresse(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Ville</label>
            </td>
            <td>
                <input name="ville" value="<?php echo $clinique->getVille(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Province</label>
            </td>
            <td>
                <input name="province" value="<?php echo $clinique->getProvince(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>CodePostal</label>
            </td>
            <td>
                <input name="codePostal" value="<?php echo $clinique->getCodePostal(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Telephone</label>
            </td>
            <td>
                <input name="telephone" value="<?php echo $clinique->getTelephone(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Courriel</label>
            </td>
            <td>
                <input name="courriel" value="<?php echo $clinique->getCourriel(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="submit" value="Modifier"/>
                <input type="button" value="Annuler" onclick="history.back();"/>
            </td>
        </tr>
    </table>
</form>