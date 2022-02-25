<?php

$landing_img = "images/blogs/girl-workout-laptop.jpg";
$landing_title = "Blog";
$breadcrumb =[
    ["/", "Accueil"],
    ["", "Blog"]
];

require_once('includes/header.php');

function getBlogCard($title, $theme, $description, $lienImage, $imageProfile, $nomProfile, $datePosted, $color) {
  return '<div class="blogcard" onclick="location.href=\'blog_article.php\';" style="cursor: pointer;">
            <div class="blogcard-header">
              <img src="'.$lienImage.'" alt="'.$title.'" />
            </div>
            <div class="blogcard-body">
              <span class="blogtag" style="background-color:'.$color.';">'.$theme.'</span>
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
  <button class="btn btnSearch active" onclick=""> Show all</button>
  <button class="btn btnSearch" onclick="this.className +=' active'"> Popular</button>
  <button class="btn btnSearch" onclick=""> Biceps</button>
  <button class="btn btnSearch" onclick=""> Triceps</button>
  <button class="btn btnSearch" onclick=""> Lower Body</button>
</div>


<div class="blogbody">

<div class="blogcontainer">  
  <?php 
    $title = "How to Keep Going When You Don’t Know What’s Next";
    $theme = "Popular";
    $description = "The future can be scary, but there are ways to deal with that fear.";
    $lienImage = "https://www.newsbtc.com/wp-content/uploads/2020/06/mesut-kaya-LcCdl__-kO0-unsplash-scaled.jpg";
    $imageProfile = "https://lh3.googleusercontent.com/ogw/ADGmqu8sn9zF15pW59JIYiLgx3PQ3EyZLFp5Zqao906l=s32-c-mo";
    $nomProfile = "Eyup Ucmaz";
    $datePosted = "Yesterday";
    $color = "#47bcd4";
    echo getBlogCard($title, $theme, $description, $lienImage, $imageProfile, $nomProfile, $datePosted, $color);
    echo getBlogCard($title, $theme, $description, $lienImage, $imageProfile, $nomProfile, $datePosted, $color);
    echo getBlogCard($title, $theme, $description, $lienImage, $imageProfile, $nomProfile, $datePosted, $color);
    echo getBlogCard($title, $theme, $description, $lienImage, $imageProfile, $nomProfile, $datePosted, $color);
    echo getBlogCard($title, $theme, $description, $lienImage, $imageProfile, $nomProfile, $datePosted, $color);
    echo getBlogCard($title, $theme, $description, $lienImage, $imageProfile, $nomProfile, $datePosted, $color);
    echo getBlogCard($title, $theme, $description, $lienImage, $imageProfile, $nomProfile, $datePosted, $color);
    echo getBlogCard($title, $theme, $description, $lienImage, $imageProfile, $nomProfile, $datePosted, $color);    
  ?>


</div>

<?php
require_once('includes/footer.php');
?>