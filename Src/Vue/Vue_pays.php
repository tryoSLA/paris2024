<h2>Pays</h2>
<table border="1">
    <tr>
        <?php
            foreach ($resultats as $unResultat)
            {
                echo "<td>".$unResultat['photo']."</br>"
                    .$unResultat['libelle']."</td>";
            }
        ?>
    </tr>
</table>

