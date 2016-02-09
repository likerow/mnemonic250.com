<?php get_header(); ?>
  <section class="posts-home text-center banner">
    <div class="main-container contact-page">     
      <div class="column-7-block text-center">        
        <h1>¡PIDE TU PACK X 10 BOTELLAS DE MNEMONIC250!</h1>
        <br>
        <img src="<?php echo get_template_directory_uri()?>/images/botellas_mn250.png">
        <img src="<?php echo get_template_directory_uri()?>/images/icons_mn250.png">
        <p>
          <span style="color:#B30B0D"> Compra 10 botellas por <strong>s/. 80.00</strong> </span>
        <br><br>
        Por lanzamiento, el delivery es gratis en Lima.
        <br>
          ¡Gracias por que con tu compra apoyas a la construcción de más Hackspaces en el Perú!
        </p>
      </div>
      <div class="column-5-block">
        <div>        
          <p></p>
        <form>
          <fieldset>
            <legend>Déjanos tus datos de pedido...</legend>
            <input type="text" placeholder="Nombre y Apellido" required>
            <input type="text" placeholder="Correo Electrónico" required>
            <input type="text" placeholder="Teléfono">
            <select>
              <option>Perú</option></select>
            <select>
              <option>Lima</option>
              <option>San Isidro</option>
            </select>
            <input type="text" placeholder="Dirección">
            <select>
              <option>No. de packs</option>
              <option>1</option>
              <option>10</option>
              <option>100</option>
            </select>            
            <input type="submit" value="Enviar">
          </fieldset>
        </form>
        </div>
      </div>
    <div>
</section>
<div class="modal">  
  <input class="modal-state" id="modal-1" type="checkbox" />
  <div class="modal-fade-screen">
    <div class="modal-inner">
      <div class="modal-close" for="modal-1"></div>
      <h1>¡Tu pedido fue enviado con éxito!</h1>
      <p class="modal-intro">Lo más pronto posible uno de nuestros agentes te contactará para confirmar la orden y fecha de entrega.</p>      
    </div>
  </div>
</div>
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery("form").on("submit", function() {
/*      if (jQuery("body").hasClass("modal-open")){
        jQuery("body").removeClass("modal-open");
        jQuery("body").addClass("modal-open");
      } else {
        jQuery("body").addClass("modal-open");
      }
      */
     jQuery("#modal-1").click();
      return false;
    });

    jQuery("#modal-1").on("change", function() {
      if (jQuery(this).is(":checked")) {
        jQuery("body").addClass("modal-open");
      } else {
        jQuery("body").removeClass("modal-open");
      }
    });

    jQuery(".modal-fade-screen, .modal-close").on("click", function() {
      jQuery(".modal-state:checked").prop("checked", false).change();
    });

    jQuery(".modal-inner").on("click", function(e) {
      e.stopPropagation();
    });
  });
</script>
<?php get_footer(); ?>
