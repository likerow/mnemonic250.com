<?php get_header() ?> 
<section class="posts-home text-center banner">
    <div class="main-container contact-page">    	
      <div class="column-7-block">                
        <h1>Nos encantaría saber de ti ...</h1>        
        <p class="margin-right-20">
        Nuestro equipo está aquí para responder cualquier pregunta que pueda tener acerca de su experiencia con nuestra bebida.      
        </p>
        <p>
          Póngase en contacto con nosotros <span class="info">info@mnemonic250.com</span>
        </p>
      </div>
      <div class="column-5-block">
        <div>
        <p>Envíanos tus preguntas y comentarios, te responderemos lo más pronto posible:</p>
          <?php while ( have_posts() ) : the_post(); ?>
              <?php the_content(); ?>
          <?php endwhile; ?>
        <!--
        <form>
          <fieldset>
            <legend>Contáctenos</legend>
            <input type="text" placeholder="Nombre y Apellido" required>
            <input type="text" placeholder="Correo Electrónico" required>
            <select>
              <option selected disabled>Asunto</option>
              <option>Retroalimentación general</option>
              <option>Quiero a Mnemonic250 en mi evento</option>
              <option>Quiero ser socio distribuidor</option>
              <option>Relaciones públicas</option>
              <option>Marketing</option>
              <option>Mnemonic250 cooporativo</option>
            </select>
            <label for="comments">Comentarios</label>
            <textarea id="comments" placeholder="..."></textarea>
            <input type="submit" value="Enviar">
          </fieldset>
        </form>
      -->
        </div>
      </div>
    <div>
</section>
<br><br>
<?php get_footer() ?> 