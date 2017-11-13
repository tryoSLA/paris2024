<html>
<head>
    <meta charset="utf-8">
</head>
<h2>Enseignement</h2>
<body></body>
    <table border="1">
        <tr>
            <?php
                foreach ($resultats as $unResultat)
                {
                    echo "<td>".$unResultat['photo']."</br>"
                        .$unResultat['libelle']."</td>;
                }
            ?>
        </tr>
    </table>
</body>

</html>