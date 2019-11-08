<?php
require_once '_inc/config.php';

try {
    $results = get_posts();
}
catch ( PDOException $e ) {
    // also handle errors maybe
    $results = [];
}



header( "Content-type: text/xml");
?>
<?= "<?xml version='1.0' encoding='UTF-8'?>
 <rss version='2.0'>
 <channel>
 <title>w3schools.in | RSS</title>
 <link>/</link>
 <description>Cloud RSS</description>
 <language>en-us</language>"?>

<?php if ( count($results) ) : foreach ( $results as $post ) : ?>
<?php
    $title = $post['title'];
    $link = $post['link'];
    $description = $post['description'];
    ?>
    <?= "<item>
           <title>$title</title>
           <link>$link</link>
           <description>$description</description>
         </item>"?>

<?php endforeach; else : ?>

    <p>we got nothing :(</p>

<?php endif ?>
<?= "</channel></rss>"?>






