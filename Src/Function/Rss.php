<?php

Class Rss
{
    public function afficherArticle($title, $link, $date, $description)
    {
        echo "
            <div class=\"col-sm-6\" style='margin-bottom: 10px '>
                <div class='card card-block h-100 justify-content-center'>
                    <div class='card-block'>
                    <center>
                        <h5 class='card-title'>" . $title . "</h5>
                        <p>" . $description . "</p>
                        <a href='$link' class='btn btn-primary'>Consulter l'article</a><br>
                        " . $date . "<br>
                     </center>
                    </div>
                </div>
            </div>";
    }

    public function rssArticle($urlJournal)
    {
        $url = $urlJournal;
        $rss = simplexml_load_file($url);
        $i = 0;
        foreach ($rss->channel->item as $item) {
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $title = $item->title;
            $link = $item->link;
            $auth = $item->link;
            $description = $item->description;
            $i++;
            $this->afficherArticle($title, $link, $date, $description);
        }
    }

    public function saveArticle($urlJournal, $db_connection)
    {
        $url = $urlJournal;
        $rss = simplexml_load_file($url);
        $i = 0;
        foreach ($rss->channel->item as $item) {
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, "Y/m/d H:i:s");
            $title = $item->title;
            $link = $item->link;
            $description = $item->description;
            $desc = mysqli_real_escape_string($db_connection, $description);
            $titre = mysqli_real_escape_string($db_connection, $title);
            $i++;

            $requete = "INSERT INTO article VALUES (NULL, '" . $link . "', '" . $titre . "', '" . $desc . "', '" . $date . "');";
            // execution de la requte avec des résultats
            $req = mysqli_query($db_connection, $requete) or die();

        }
    }
}
