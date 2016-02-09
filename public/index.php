<?php get_header(); ?>
<section class="banner text-center">
    <img src="<?php echo get_template_directory_uri()?>/images/banner_img.png" alt="" />
  </section>
  <section class="info-home text-center">
    <div class="main-container">
      <div class="frase">
        ¡Para todos los que no pueden parar de crear!
      </div>
      <div class="btn-pideaqui">
        <a href="<?php echo get_site_url(); ?>/pedidos"><img src="<?php echo get_template_directory_uri()?>/images/boton_pideaqui.png" alt="" /></a>
      </div>
      <div class="social-container">
        <ul>
          <li><a href="https://www.facebook.com/Mnemonic250-445618888954793"><img src="<?php echo get_template_directory_uri()?>/images/face_icon.png" alt="facebook" /></a></li>
          <li><a href="https://twitter.com/mnemonic250"><img src="<?php echo get_template_directory_uri()?>/images/twitter_icon.png" alt="facebook" /></a></li>
          <li><a href="https://www.instagram.com/mnemonic250/"><img src="<?php echo get_template_directory_uri()?>/images/instagran_icon.png" alt="facebook" /></a></li>
        </ul>
      </div>
      <img class="botella" src="<?php echo get_template_directory_uri()?>/images/botella_mn250.png" alt="botella" />
      <span class="botella-title">Consúmase helada</span>
      <div class="made">
        #MadeByHackers
      </div>
      <div class="number-post">
        1,250 985 posts
      </div>
    </div>
  </section>
  <section class="posts-home text-center">
    <div class="main-container">
      <?php echo wdi_feed(array('id'=>'1')); ?>      
  </section>
<?php get_footer(); ?>