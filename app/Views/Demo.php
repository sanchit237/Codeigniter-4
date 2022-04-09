<html>
    <head>
        <title><?= $title;?></title>
    </head>
    <body>
        <h2><?= $heading;?></h2>
        <ul>
        <?php
        if (count($languages)>0):
            foreach ($languages as $language):
            ?>   
                <li><?= $language;?></li>
            <?php    
            endforeach;
            else:
                echo "<p>No results found<p>";
            endif;    
        ?>
        </ul>
    </body>
</html>