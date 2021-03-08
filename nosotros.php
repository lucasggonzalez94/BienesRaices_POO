<?php
    require "includes/funciones.php";
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="Sobre Nosotros" loading="lazy">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi est ipsa itaque delectus deleniti quibusdam esse ut accusantium, tempora nemo eum omnis laudantium eveniet consequuntur reiciendis ipsum veritatis quos magni. Accusamus eaque animi repellendus quasi quos, tempora voluptatibus ex sunt impedit vero iste dignissimos. Commodi illo vero quisquam corporis nobis quibusdam perferendis at nam, asperiores error debitis quam dolorem beatae aut optio. Quibusdam nobis quisquam nostrum illo, tenetur vitae vero delectus, quo, ex quis ullam deleniti ipsum molestias alias velit.</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, fugit perferendis. Delectus recusandae iure quod blanditiis saepe dolorum praesentium, est autem esse veniam odio repudiandae veritatis. Culpa rem eaque nihil soluta recusandae libero alias cum suscipit nisi harum. Consectetur dignissimos error eos consequatur eveniet magni, voluptates recusandae iusto eligendi quia.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptate vitae in magni voluptatem reiciendis, libero sunt voluptatum ad eum eligendi impedit praesentium? Ducimus animi labore nesciunt quia quam voluptates.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptate vitae in magni voluptatem reiciendis, libero sunt voluptatum ad eum eligendi impedit praesentium? Ducimus animi labore nesciunt quia quam voluptates.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptate vitae in magni voluptatem reiciendis, libero sunt voluptatum ad eum eligendi impedit praesentium? Ducimus animi labore nesciunt quia quam voluptates.</p>
            </div>
        </div>
    </section>

<?php incluirTemplate('footer'); ?>