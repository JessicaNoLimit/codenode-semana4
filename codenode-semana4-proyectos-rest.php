<?php
/*
Plugin Name: CodeNode Semana 4 - Proyectos REST
Description: Plugin personalizado para registrar el CPT proyecto, exponerlo en la REST API y mostrar proyectos en el frontend.
Version: 1.0
Author: Jesica Serrano
*/

if (!defined('ABSPATH')) {
    exit;
}
function codenode_s4_registrar_cpt_proyecto() {

    $args = array(
        'labels' => array(
            'name' => 'Proyectos',
            'singular_name' => 'Proyecto'
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title')
    );

    register_post_type('proyecto', $args);
}

add_action('init', 'codenode_s4_registrar_cpt_proyecto');

function codenode_s4_registrar_acf_en_rest() {
    register_rest_field('proyecto', 'descripcion_corta', array(
        'get_callback' => function($post_arr) {
            return get_field('descripcion_corta', $post_arr['id']);
        },
        'schema' => array(
            'description' => 'Descripción corta del proyecto',
            'type'        => 'string',
            'context'     => array('view', 'edit')
        )
    ));
}

add_action('rest_api_init', 'codenode_s4_registrar_acf_en_rest');

function codenode_s4_mostrar_proyectos_shortcode() {
    ob_start();
    ?>
    <div id="codenode-proyectos-lista">
        <p>Cargando proyectos...</p>
    </div>
    <script>
document.addEventListener("DOMContentLoaded", function() {

    fetch("http://localhost/wordpress/wp-json/wp/v2/proyecto")
        .then(response => response.json())
        .then(data => {

            const contenedor = document.getElementById("codenode-proyectos-lista");
            contenedor.innerHTML = "";

            data.forEach(proyecto => {

                const titulo = proyecto.title.rendered;
                const descripcion = proyecto.descripcion_corta;

                const html = `
                    <div style="margin-bottom:20px;">
                        <h3>${titulo}</h3>
                        <p>${descripcion}</p>
                    </div>
                `;

                contenedor.innerHTML += html;

            });

        })
        .catch(error => {
            console.error("Error:", error);
        });

});
</script>
    <?php
    return ob_get_clean();
}

add_shortcode('codenode_proyectos', 'codenode_s4_mostrar_proyectos_shortcode');