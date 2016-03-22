<?php
    // Include Files
    include('lib/simple_html_dom.php');
    include('bdd/connect.php');
    global $conn;
    // Boucle for 43 pages
    for($i=1;$i<44;$i++){

        $lngProverbe = 'français';
        $lngProverbe = utf8_decode($lngProverbe);

        // Set Url Dynamicly
        $url = 'http://www.linternaute.com/proverbe/recherche/a/' . $i .'/';
        $page = file_get_html($url);

        //Insert Url in Table Pages
        $sql = "INSERT INTO pages (urlPage) VALUES ('".$url."')";
       $conn->query($sql);
           
        //Get List of Roverbs
        $proverbes = $page->find('tr td a strong');

        foreach($proverbes as $proverbe)
        {   
            // get Last idPage insered
            $sql = "SELECT MAX(idPage) FROM pages";
            $row = $conn->query($sql);
            $maxId = $row->fetch_assoc();

            // 0 if traduction of proverbe does not exist
            $idProverbeTraduction = 0;

            // Delete Balise <strong></strong>
            preg_match_all("|<[^>]+>(.*)</[^>]+>|U",$proverbe, $out, PREG_PATTERN_ORDER);

            //Solve probleme UTF8
            $proverbe = utf8_decode(addslashes($out[1][0]));
           

            // Insert proverb in Table Proverbes
            $sql = "INSERT INTO proverbes (proverbeContent, idPage, lngProverbe, idProverbeTraduction) 
                    VALUES ('".$proverbe."',".$maxId['MAX(idPage)'].",'".$lngProverbe."',".$idProverbeTraduction.")";

           $conn->query($sql);

        }

        
    }
?>