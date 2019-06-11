<?php
require 'header.web.php';
?>
<!-- Imagen de tipo parallax que se mueve conforme el usuario navega -->
<div class="parallax-container" style="height:900px;">
  <div class="parallax"><img src="../images/slide3.jpeg"></div>
</div>
<!--Mensaje de bienvenida al usuario-->
<br><br><br>
<div class="row">
  <div class="col s1"></div>
  <div class="col s5" ><h5><b>Clínica Apolo es el consultorio de calidad más confiable en la ciudad, brindando una atención personal a ti y a tu familia.</b></h5><p>
    Nuestro servicio de calidad y el toque familiar nos distingue.</p></div>
  </div>
  <br>
  <!--Slider con imagenes de las instalaciones-->
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="../images/slide1.jpeg">
        <div class="caption right-align">
          <h3 class=" grey-text text-darken-4">Siéntete como en casa</h3>
          <h5 class=" grey-text text-darken-4">Ven y siéntete como en casa en nuestras salas de espera.</h5>
        </div>
      </li>
      <li>
        <img src="../images/slide2.jpeg">
        <div class="caption left-align">
          <h3 class=" grey-text text-darken-4">Servicio de Calidad</h3>
          <h5 class="  grey-text text-darken-4">Estamos siempre atentos y felices de recibirte.</h5>

        </div>
      </li>
      <li>
        <img src="../images/parallax.jpeg">
        <div class="caption left-align">

          <h3 >Experiencia que nos respalda</h3>
          <h5 >Nuestros más de 20 años de experiencia nos respaldan para brindarte el mejor servicio.</h5>
        </div>
      </li>
    </ul>
  </div>
  <br><br>
  <div class="divider"></div>
  <br><br>
  <p class="center-align">Galería de clientes satisfechos</small>
    <h5 class="center-align">Nuestros clientes te comparten su experiencia</h5>
    <br>
    <div class="row">
      <div class="col s4">
        <div class="card ">
          <div class="card-image">
            <img src="../images/cliente1.jpeg">
            <span class="card-title">Elisa, 18 años</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red" href="#"><i class="material-icons">favorite</i></a>
          </div>
          <div class="card-content">
            <p>Mi madre comenzó a traerme a los 15 años a esta clínica, desde entonces es el lugar al que acudo siempre que necesito un chequeo o tengo alguna emergencia, me encanta la sala de espera y el trato del personal.</p>
          </div>
        </div>
      </div>

      <div class="col s4">
        <div class="card ">
          <div class="card-image">
            <img src="../images/cliente2.jpeg">
            <span class="card-title">Jorge y Carmen, 75 y 72 años</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red" href="#"><i class="material-icons">favorite</i></a>
          </div>
          <div class="card-content">
            <p>Nuestros hijos nos hablaron de esta clínica, y desde entonces Jorge realiza sus chequeos mensuales aquí, y yo vengo siempre que necesito que me revisen la presión o cuando siento malestares, las personas que trabajan en la clínica son muy amables y el lugar es muy bonito.</p>
          </div>
        </div>
      </div>

      <div class="col s4">
        <div class="card">
          <div class="card-image">
            <img src="../images/cliente3.jpeg">
            <span class="card-title">Sofía y su equipo, 15 años</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red" href="#"><i class="material-icons">favorite</i></a>
          </div>
          <div class="card-content">
            <p>Estar en un equipo de béisbol implica que habrán accidentes en ocasiones, y siempre que han habido lesiones o cualquier tipo de emergencia durante un partido, acudimos inmediatamente a esta clínica, ya que está cerca de la escuela y siempre nos atienden con amabilidad.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col s4">
        <div class="card ">
          <div class="card-image">
            <img src="../images/cliente4.jpeg">
            <span class="card-title">Alejandra y Francisco, 27 y 31 años</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red" href="#"><i class="material-icons">favorite</i></a>
          </div>
          <div class="card-content">
            <p>Alejandra y yo visitamos esta clínica por primera vez para informarnos de la planificación familiar, desde entonces acudimos siempre, los doctores aquí saben hacer su trabajo muy bien.</p>
          </div>
        </div>
      </div>

      <div class="col s4">
        <div class="card ">
          <div class="card-image">
            <img src="../images/cliente5.jpeg">
            <span class="card-title">Pedro, 51 años</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red" href="#"><i class="material-icons">favorite</i></a>
          </div>
          <div class="card-content">
            <p>Provengo de una familia diabética y llevo cinco años asistiendo a esta clínica bajo el cuidado del doctor Rodriguez, gracias al plan alimenticio y médico que me han brindado he disfrutado de años saludables junto a mi familia.</p>
          </div>
        </div>
      </div>

      <div class="col s4">
        <div class="card">
          <div class="card-image">
            <img src="../images/cliente6.jpeg">
            <span class="card-title">Juan, Perla y Esmeralda, 30 años, 28 años, 7 meses</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red" href="#"><i class="material-icons">call_made</i></a>
          </div>
          <div class="card-content">
            <p>Desde que comenzó el embarazo de Perla comenzamos a asistir a esta clínica, y aquí traemos a Esmeralda desde que requirió sus primeras consultas, se siente muy a gusto aquí.</p>
          </div>
        </div>
      </div>
    </div>

    <?php

    require 'footer.web.php';

    ?>
