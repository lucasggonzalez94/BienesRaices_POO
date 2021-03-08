<?php
    require "includes/funciones.php";
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img src="build/img/destacada2.jpg" alt="imagen de la propiedad" loading="lazy">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi est ipsa itaque delectus deleniti quibusdam esse ut accusantium, tempora nemo eum omnis laudantium eveniet consequuntur reiciendis ipsum veritatis quos magni. Accusamus eaque animi repellendus quasi quos, tempora voluptatibus ex sunt impedit vero iste dignissimos. Commodi illo vero quisquam corporis nobis quibusdam perferendis at nam, asperiores error debitis quam dolorem beatae aut optio. Quibusdam nobis quisquam nostrum illo, tenetur vitae vero delectus, quo, ex quis ullam deleniti ipsum molestias alias velit.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, fugit perferendis. Delectus recusandae iure quod blanditiis saepe dolorum praesentium, est autem esse veniam odio repudiandae veritatis. Culpa rem eaque nihil soluta recusandae libero alias cum suscipit nisi harum. Consectetur dignissimos error eos consequatur eveniet magni, voluptates recusandae iusto eligendi quia.</p>
        </div>
    </main>

<?php incluirTemplate('footer'); ?>