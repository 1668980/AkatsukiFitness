<?php

$landing_img = "images/blogs/girl-workout-laptop.jpg";
$landing_title = "Blog";
$breadcrumb =[
    ["/", "Accueil"],
    ["", "Blog"]
];

require_once('includes/header.php');

function getBlogCard($title, $categorie, $description, $lienImage, $imageProfile, $nomProfile, $datePosted, $color) {
  return '<div class="blogcard" onclick="location.href=\'blog_article.php\';" style="cursor: pointer;">
            <div class="blogcard-header">
              <img src="'.$lienImage.'" alt="'.$title.'" />
            </div>
            <div class="blogcard-body">
              <span class="blogtag" style="background-color:'.$color.';">'.$categorie.'</span>
              <h4>'.$title.'</h4>
              <p>'.$description.'</p>
              <div class="bloguser">
                <img src="'.$imageProfile.'" alt="user" />
                <div class="bloguser-info">
                  <h5>'.$nomProfile.'</h5>
                  <small>'.$datePosted.'</small>
                </div>
              </div>
            </div>
          </div>'; 
}

?>

<div class="searchFilter mb-3">
  <div class="searchBox">
      <input class="searchInput"type="text" name="" placeholder="Search">
      <button class="searchButton" href="#">
      <span class="bi-search"></span>
      </button>
  </div>
</div>
<div class="filterContainer mb-5">
<?php
    $categories = $crud->getAllCategoriesBlog();
    $rep = '';
    foreach($categories as $categorie) {
      $nom = $categorie['nom'];
      $rep .= '<button class="btn btnSearch" id="'.$nom.'" onclick="changeFilter("'.$nom.'");"> '.$nom.' </button>';
    }
    echo $rep;
  ?>
</div>
<script>
function changeFilter($categorie) {
  document.getElementById($categorie).addClass('active');
}
</script>


<div class="blogbody">

<div class="blogcontainer">  
  <?php 

    $blogs = $crud->getAllBlogs();
    $rep = '';
    foreach ($blogs as $blog) {
      $categorie = $crud->getCategoriesBlog($blog['idcategorie'])[0];
      $imagelien = $crud->getLienImage($blog['imageID'])[0]['lien'];
      $imageProfile = "https://lh3.googleusercontent.com/ogw/ADGmqu8sn9zF15pW59JIYiLgx3PQ3EyZLFp5Zqao906l=s32-c-mo";
      $rep .= getBlogCard($blog['titre'], $categorie['nom'], $blog['description'], $imagelien, $imageProfile, $blog['auteur'], $blog['date'], $blog['couleur']);
    }
  echo $rep;  
  ?>


</div>

<?php
require_once('includes/footer.php');
?>