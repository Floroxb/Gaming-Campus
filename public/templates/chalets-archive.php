<?php
get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <?php
    if (have_posts()) :
    ?>
      <div class="container-cards">
        <?php

        while (have_posts()) :
          the_post();

        ?>
          <div class="card-chalet">

            <img class="card_image">
              <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail();
                 }
              ?>
            </img>
            <div class="card_description">
              <li class="card_title"><?php the_title(); ?></li>

              <ul>

                <li class="card_person">
                  <?php
                    $personne = get_fields()['nombre_de_personne'];
                    echo $personne
                  ?>
                </li>

                <li class="card_service">
                  <?php 
                    $terms = get_the_term_list($id, 'services_proposes', '', ' / ');
                    echo $terms 
                  ?>
                </li>

              </ul>
              <a href="<?php the_permalink(); ?>">Lien</a>
            </div>

            
          </div>
        <?php

        endwhile;
        ?>
      </div>
    <?php
    endif;
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
