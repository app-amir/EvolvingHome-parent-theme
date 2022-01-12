<?php
/**
 * Registered Widget Area
 */
add_action( 'widgets_init', 'evolvinghome_widget_registered' );

function evolvinghome_widget_registered() {

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer', 'EvolvingHome' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'EvolvingHome' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Social links', 'EvolvingHome' ),
            'id'            => 'sidebar-2',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'EvolvingHome' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Copyright', 'EvolvingHome' ),
            'id'            => 'sidebar-3',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'EvolvingHome' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Newsletter Details', 'EvolvingHome' ),
            'id'            => 'newsletter',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'EvolvingHome' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Details Page Sidebar Menu', 'EvolvingHome' ),
            'id'            => 'details_menu',
            'description'   => esc_html__( 'Add widgets here to appear in your Details Side bar.', 'EvolvingHome' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Details Page Sidebar Ad Image', 'EvolvingHome' ),
            'id'            => 'details_image',
            'description'   => esc_html__( 'Add widgets here to appear in your Details Side bar.', 'EvolvingHome' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}