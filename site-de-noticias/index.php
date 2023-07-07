<?php
$estiloPagina = 'noticias.css';
require_once 'header.php';
?>
<!--CATEGORIAS --->
<form action="#" class="container-noticias formulario-pesquisa-categorias">
        <h2 class="categorias">Categorias</h2>
        <select name="categorias" id="categorias">
                <option value="">--Selecione--</option>
                <?php
                $categorias = get_terms(array('taxonomy' => 'categorias'));
                foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria->name ?>" <?= !empty($_GET['categorias']) && $_GET['categorias'] === $categoria->name ? 'selected' : '' ?>><?= $categoria->name ?></option>
                <?php endforeach;
                ?>
        </select>
        <input type="submit" value="Pesquisar">
</form>

<?php

if (!empty($_GET['categorias'])) {
        $categoriaSelecionada = array(array(
                'taxonomy' => 'categorias',
                'field' => 'name',
                'terms' => $_GET['categorias']
        ));
}

$args = array(
        'post_type' => 'noticias',
        'tax_query' => !empty($_GET['categorias']) ? $categoriaSelecionada : ''
);
$query = new WP_Query($args);

if ($query->have_posts()) :
        echo '<main class="page-noticias">';
        echo '<ul class="lista-noticias container-noticias">';
        while ($query->have_posts()) : $query->the_post();
                echo '<li class="col-md-3 noticias" >';
                the_title(before: '<h3 class="titulo-noticia">', after: '</h3>');
                the_content();
                echo '<button class="btn-saiba-mais">Saiba Mais</button>';
                echo '</li>';
        endwhile;
        echo '</ul>';
        echo '</main>';
endif;
require_once 'footer.php';
