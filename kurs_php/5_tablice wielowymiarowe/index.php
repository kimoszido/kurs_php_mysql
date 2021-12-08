<?php
    
    //tablice wielowymiarowe

    // $blogs = [
    //     ['mario party', 'mario', 'lorem', 30],
    //     ['mario cart cheats', 'toad', 'lorem', 25],
    //     ['zelda hidden', 'link', 'lorem', 50]
    // ];

    //print_r($blogs[1][1]);

    $blogs = [
        ['tittle'=>'mario party', 'author'=>'mario', 'content'=>'lorem', 'likes'=>30],
        ['tittle'=>'mario cart cheats', 'author'=>'toad', 'content'=>'lorem', 'likes'=>25],
        ['tittle'=>'zelda hidden', 'author'=>'link', 'content'=>'lorem', 'likes'=>50]
    ];
    //echo $blogs[2]['author'];
    //echo count($blogs);
    $blogs[] = ['tittle'=>'castle party', 'author'=>'peach', 'content'=>'lorem', 100];
    //print_r($blogs)
    
    $popped = array_pop($blogs); //uuwanie ostatniego bloku z tablicy
    //print_r($popped);

?>
<!DOCTYPE html> 
<html>
    <head>
        <title>PHP Tutorials</title>
    </head>
    <body>
        
    </body>
</html>