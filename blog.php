<?php
require_once('includes/header.php');
?>

<main class="bg-dark">
    <div class="container w-50 ">
        <div class="card-group container-fluid ">

            <!-- TODO: foreach articles du blog -->


            <div class="card align-items-center mt-5 mb-5">
                article 1
                <a href="blog_article.php?id=1">show article</a>=
            </div>
            
            <div class="card align-items-center mt-5 mb-5">
                article 2 
                <a href="blog_article.php?id=2">show article</a>
            </div>

            <div class="card align-items-center mt-5 mb-5">
                article 3
                <a href="blog_article.php?id=3">show article</a>

            </div>
        </div>
    </div>
</main>


<?php
require_once('includes/footer.php');
?>