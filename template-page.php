<?php
/**
 * Template Name: Plantilla General Página
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tema
 */
 get_header(); ?>


     	<section class="header-seccion" style="background-image: url(<?php global $post; $thumbID = get_post_thumbnail_id( $post->ID ); $imgDestacada = wp_get_attachment_url( $thumbID ); echo $imgDestacada;?>);">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="titulo-1"><?php the_title(); ?></h1>
            </div>
          </div>
        </div>
     	</section>

      <div class="container mt-5 mb-5">
        <div class="row">
          <div class="col-lg-8 col-12 order-2 order-lg-1" id="introduccion">
            <div class="contenido-plantilla">
            
            <?php //Contenido editor wordpress
              if (have_posts()) : while (have_posts()) : the_post();
                  the_content();
                  endwhile; endif;
              ?> 
            </div>


            <?php //Inicio campo conenido principal ACF
                if (have_rows('sub_contenido')):
                  while (have_rows('sub_contenido')) : the_row();
            ?>

            <div class="contenido" style="position: relative;">

              <div id="<?php echo get_sub_field("id"); ?>">
              </div>

                <?php //Subtitulo principal
                  if (get_sub_field('subtitulo')) {  ?>
                    <div class="subtitulo">
                      <h2 class="titulo-2"><?php echo get_sub_field("subtitulo"); ?></h2>
                    </div>
                <?php } ?>

              <?php //Opción contenido WYSIWYG
                if (get_sub_field('contenido')) {
                  echo get_sub_field('contenido'); } ?>

              <?php //Opción botones cuadrados
                if (get_sub_field('boton_cuadrado')) {  ?>
              <div class="row botones-cuadrados">
                <?php
                    if (have_rows('boton_cuadrado')):
                      while (have_rows('boton_cuadrado')) : the_row();
                ?>
                <div class="col-lg col-12">
                  <a href="<?php echo get_sub_field('url'); ?>">
                  <div class="cuadrado-azul mt-3 <?php echo get_sub_field('color_class'); ?>">
                    <div class="row">
                      <div class="col-lg-10 col-10">
                        <h4><?php echo get_sub_field('boton_texto'); ?></h4>
                      </div>
                      <div class="col-lg-1 col-2">
                        <i class="fas fa-arrow-up"></i>
                      </div>
                    </div>
                  </div>
                  </a>
                </div>
                <?php
              endwhile;
                  endif;
                ?>
              </div>
              <?php } ?>

              <?php //opción acordeón
                  if (get_sub_field('acordeon')) {  ?>
                    <div class="acordeon acordeon-blanco">
                      <ul>
                    <?php
                        if (have_rows('acordeon')):
                          while (have_rows('acordeon')) : the_row();
                    ?>
                    <li>
                      <input type="checkbox" checked>
                        <i class="chevron"></i>
                      <h4><?php echo get_sub_field('titulo'); ?></h4>
                      <div class="contAcordeon bg-gris p-3">
                        <?php echo get_sub_field('contenido'); ?>
                      </div>
                    </li>
                    <?php
                  endwhile;
                      endif;
                    ?>
                  </ul>
                </div>
                <?php } ?>

                <?php //opción items
                    if (get_sub_field('subtitulo_items')) {  ?>
                <div class="contenido-items">
                    <?php
                      if (have_rows('subtitulo_items')):
                      while (have_rows('subtitulo_items')) : the_row();
                    ?>
                    <div class="items">
                      <div class="subtitulo-items">
                        <h3 class="titulo-3"><?php echo get_sub_field('subtitulo'); ?></h3>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <p><?php echo get_sub_field('no_item'); ?></p>
                        </div>
                        <?php
                            if (have_rows('items')):
                              while (have_rows('items')) : the_row();
                        ?>
                        <div class="col-lg-12">
                          <p><i class="fas fa-check"></i> <?php echo get_sub_field('item'); ?></p>
                        </div>
                        <?php
                      endwhile;
                          endif;
                        ?>
                      </div>
                    </div>
                    <?php
                  endwhile;
                      endif;
                    ?>
                  </div>
                  <?php } ?>

              <?php //opción slider
              if (get_sub_field('slider')) {  ?>

              <div class="slider">
                <ul class="slider-carrera owl-carousel">
                  <?php
                    if(have_rows('slider')):
                        while(have_rows('slider')) : the_row();
                  ?>
                  <li class="item-noticia">
                    <figure class="img-noticia" style="background-image: url(<?php echo get_sub_field('imagen'); ?>); height: 400px;">
                    </figure>
                  </li>
                  <?php
                      endwhile;
                    endif;
                  ?>
                </ul>
              </div>
              <?php } ?>


              <?php //Opción botones redondos
                if (get_sub_field('boton_redondo')) {  ?>
              <div class="row botones-redondos">
                <?php
                    if (have_rows('boton_redondo')):
                      while (have_rows('boton_redondo')) : the_row();
                ?>

                  <a href="<?php echo get_sub_field('url'); ?>" class="boton-lineal boton-celeste <?php echo get_sub_field('color_class'); ?>">
                    <?php echo get_sub_field('boton_texto'); ?>
                  </a>

                <?php
              endwhile;
                  endif;
                ?>
              </div>
              <?php  } ?>
            </div><!-- Fin contenido -->

            <?php
          endwhile;
              endif;
            ?>
          </div><!-- Fin col-8 -->

          <div class="col-lg-4 col-12 order-1 order-lg-2">
              <div class="side">
                  <?php //Items barra lateral
                      if (have_rows('sidebar')):
                        while (have_rows('sidebar')) : the_row();
                  ?>

                  <?php if (get_sub_field('link') === 0) { ?>
                    <h5 class="no-margin"><?php echo get_sub_field('item_side'); ?></h5>
                  <?php  }else { ?>

                    <a class="item" href="<?php echo get_sub_field('link'); ?>" target="<?php echo $target; ?>">
                      <h5 class="no-margin"><?php echo get_sub_field('item_side'); ?>
                        <?php

                          $iconCampo = get_sub_field('icono');

                          switch ($iconCampo) {
                                case 'flechaA':
                                  $icon = '<i class="fas fa-arrow-down"></i>';
                                break;

                                case 'flechaL':
                                  $icon = '<i class="fas fa-arrow-up"></i>';
                                  $target = '_blank';
                                break;

                                case 'tel':
                                  $icon = '<i class="fas fa-phone azul"></i>';
                                break;

                                case 'mail':
                                  $icon = '<i class="fas fa-envelope azul"></i>';
                                break;

                                case 'mapa':
                                  $icon = '<i class="fas fa-map-marked-alt azul"></i>';
                                  $target = '_blank';
                                break;

                                default:
                                  $icon = '<i class="fas fa-arrow-down"></i>';
                                break;
                          }

                          echo $icon;

                           ?>
                      </h5>
                    </a>

                  <?php } ?>

                <?php endwhile; endif; ?>
              </div>
          </div><!-- Fin col-4 -->

        </div><!-- Fin row -->
      </div><!-- Fin container -->


 <?php
 get_footer();
