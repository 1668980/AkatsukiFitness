        <!-- login modal -->
        <?php include('includes/modal_login.php') ?>

        <?php
         if (! isset($skip_container) || !$skip_container) {
        ?>
        </div>
        <?php } ?>



        <footer id="footer" class="footer-main">
            <div class="row">
                <div class="col-md-3">
                     <h5>Akatsuki Fitness</h5>
                
                </div>
                <div class="col-md-3">
                    <ul>
                        <li><a href="workouts.php">Entraînements</a></li>
                        <li><a href="membership_plans.php">Forfaits</a></li>
                        <li><a href="profile.php">Profil</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="shop_index.php">Boutique</a></li>
                        <li><a href="mailto:info@akatsukifitness.com">Nous contacter</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <a class="btn-social" href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a class="btn-social" href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a class="btn-social" href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a class="btn-social" href="#"><i class="fa-brands fa-tiktok"></i></a>
                </div>

            </div>
  
            <hr>
        
            <p class="text-center"><small>Copyright &copy; <?echo date("Y") ?> Akatsuki Fitness</small></p>
                
    
            </p>
        </footer>
    </body>

</html>