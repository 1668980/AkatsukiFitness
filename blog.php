<?php

$landing_img = "images/blogs/girl-workout-laptop.jpg";
$landing_title = "Blog";
$breadcrumb =[
    ["/", "Accueil"],
    ["", "Blog"]
];

require_once('includes/header.php');

function getBlogCard($id, $title, $categorie, $description, $lienImage, $imageProfile, $nomProfile, $datePosted, $color) {
  return '<div class="blogcard" onclick="location.href=\'blog_article.php?idblog='.$id.'\';" style="cursor: pointer;">
            <div class="blogcard-header">
              <img src="'.$lienImage.'" alt="'.utf8_encode($title).'" />
            </div>
            <div class="blogcard-body">
              <span class="blogtag" style="background-color:'.$color.';">'.utf8_encode($categorie).'</span>
              <h4>'. ($title).'</h4>
              <p>'.($description).'</p>
              <div class="bloguser">
                <img src="'.$imageProfile.'" alt="user" />
                <div class="bloguser-info">
                  <h5>'. ($nomProfile).'</h5>
                  <small>'.$datePosted.'</small>
                </div>
              </div>
            </div>
          </div>'; 
}



?>

<form action="blog.php#search-result">
<div class="searchFilter mb-3">
  <div class="searchBox">
      <input class="searchInput"type="text" name="title" placeholder="Search">
      <button class="searchButton" href="#">
      <span class="bi-search"></span>
      </button>
  </div>
</div>
</form>
<div class="filterContainer mb-5">
<?php
    $categories = $crud->getAllCategoriesBlog();
    $rep = '';
    $rep .= '<a class="btn btn-danger btn-cat-blog me-2 mb-2" href="blog.php">All</a>';   
    foreach($categories as $categorie) {
      $id = $categorie['idcategorie'];
      $nom = $categorie['nom'];
      $rep .= '<a class="btn btn-danger btn-cat-blog me-2 mb-2"" href="blog.php?idcat='.$id.'#search-result ">'. ($nom).'</a>';      
    }
    echo $rep;
  ?>
  <a class="btn btn-outline-light bg-gradient btn-cat-blog me-2 mb-2" href="blog.php"><i class="bi bi-x-circle"></i></a>
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
    if (isset($_GET['title'])) {
      $blogs = $crud->getBlogByTitleSearch($_GET['title']);
    }
    else if (isset($_GET['idcat'])) {
      $blogs = $crud->getAllBlogsWithCategorie($_GET['idcat']);
    }
    
    $rep = '';
    foreach ($blogs as $blog) {
      $categorie = $crud->getCategoriesBlog($blog['idcategorie'])[0];
      $imagelien = $crud->getLienImage($blog['imageID'])[0]['lien'];
      $imageProfile = "https://lh3.googleusercontent.com/ogw/ADGmqu8sn9zF15pW59JIYiLgx3PQ3EyZLFp5Zqao906l=s32-c-mo";
      $rep .= getBlogCard($blog['idblog'], $blog['titre'], $categorie['nom'], $blog['description'], $imagelien, $imageProfile, $blog['auteur'], $blog['date'], $blog['couleur']);
    }
  echo $rep;  
  ?>


</div>

<?php
require_once('includes/footer.php');
?>