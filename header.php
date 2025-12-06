<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" xmlns="http://www.w3.org/1999/html">
<head>
        <link rel="shortcut icon" href="<?php _cz( 'tp_favicon' ); ?>"/>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <?php
    global $ADSTM;
    if(isset($ADSTM[ 'product' ])) {
        $product = $ADSTM['product'];
        if (isset($product['gallery'][0]['full'])) {
            ?>
            <meta property="og:image" content="<?php echo $product['gallery'][0]['full']; ?>"/>
            <meta property="og:image:width" content="768"/>
            <meta property="og:image:height" content="768"/>
        <?php }
    }
    adsTmpl::box_meta();
    $adstm_theme = wp_get_theme();
    $version = $adstm_theme->get( 'Version' );
    ?>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link  href="<?php echo get_template_directory_uri(); ?>/assets/css/head.css?ver=<?php echo $version; ?>" rel="stylesheet">
        <link  href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap5-overrides.css?ver=<?php echo $version; ?>" rel="stylesheet">
        <link  href="<?php echo get_template_directory_uri(); ?>/assets/css/header-modern.css?ver=<?php echo $version; ?>" rel="stylesheet">
        <link  href="<?php echo get_template_directory_uri(); ?>/assets/css/override.css?ver=<?php echo $version; ?>" rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script defer src="<?php echo get_template_directory_uri(); ?>/js/header-modern.js?ver=<?php echo $version; ?>"></script>

        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>    <![endif]-->

        <?php wp_head(); ?>

        <style>
                <?php echo cz('tp_style');?>
        </style>
        <?php echo cz( 'tp_head' ); ?>

    <?php $body_classes = [];

    $current_post_type = get_post_type(get_the_ID());
    $post_type_is_product = $current_post_type === 'product';

    if( cz( 'tp_item_imgs_lazy_load' ))
        array_push( $body_classes, 'js-items-lazy-load' );


    if (cz('tp_single_enable_pre_selected_variation')) {
        if ($post_type_is_product) {
            array_push($body_classes, 'js-show-pre-selected-variation');
        }
    }
    do_action('ads_head_addons');
    $template_dir = get_template_directory_uri();
    ?>
    <script>
        ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
    </script>
    <?php if(cz('social_sharing') && (is_front_page() || is_home())){ ?>
        <meta property="og:image" content="<?php _cz('social_sharing') ?>" />
    <?php } ?>
</head>

<body <?php body_class($body_classes); ?>>
<?php wp_body_open(); ?>
<div class="site-wrapper">
<?php
    $cta_text = trim( cz('tp_header_cta_text') );
    $cta_link = trim( cz('tp_header_cta_link') );
    $cta_target = cz('tp_header_cta_target') ? ' target="_blank" rel="noopener"' : '';
    $account_url = adstm_home_url('/account/');

    $desktop_menu = wp_nav_menu([
        'theme_location' => 'top_menu',
        'container' => false,
        'menu_class' => 'navbar-nav flex-lg-row align-items-lg-center justify-content-center gap-lg-4 text-uppercase fw-medium',
        'fallback_cb' => false,
        'echo' => false
    ]);

    $mobile_menu = wp_nav_menu([
        'theme_location' => 'top_menu',
        'container' => false,
        'menu_class' => 'nav flex-column gap-2 list-unstyled codex-offcanvas-links',
        'fallback_cb' => false,
        'echo' => false
    ]);
?>

<div class="offcanvas offcanvas-end codex-offcanvas" tabindex="-1" id="codexOffcanvas" aria-labelledby="codexOffcanvasLabel">
    <div class="offcanvas-header codex-offcanvas-header">
        <div class="codex-offcanvas-logo" id="codexOffcanvasLabel">
            <?php do_action('adstm_logo_header'); ?>
        </div>
        <button type="button" class="btn-close codex-offcanvas-close" data-bs-dismiss="offcanvas" aria-label="<?php esc_attr_e('Close menu', 'rap'); ?>"></button>
    </div>
    <div class="offcanvas-body codex-offcanvas-body d-flex flex-column gap-4">
        <nav class="codex-offcanvas-nav flex-grow-1" aria-label="<?php esc_attr_e('Mobile navigation', 'rap'); ?>">
            <p class="codex-offcanvas-label text-uppercase fw-semibold mb-2"><?php esc_html_e('Browse', 'rap'); ?></p>
            <?php
            if($mobile_menu) {
                echo $mobile_menu;
            } else {
                ob_start();
                do_action('ads_pages_menu');
                $fallback_mobile_menu = ob_get_clean();
                echo '<div class="codex-fallback-menu">' . $fallback_mobile_menu . '</div>';
            }
            ?>
        </nav>
        <div class="codex-offcanvas-meta d-flex flex-column gap-3">
            <a class="btn codex-start-btn codex-header-cta w-100" href="<?php echo esc_url( home_url('/contact-us') ); ?>"><?php esc_html_e('Start For Free', 'rap'); ?></a>
            <div class="codex-offcanvas-card">
                <div class="codex-offcanvas-card-label text-uppercase fw-semibold"><?php esc_html_e('Account', 'rap'); ?></div>
                <div class="codex-offcanvas-card-content codex-offcanvas-account">
                    <?php do_action('adstm_loginButton'); ?>
                </div>
            </div>
            <div class="codex-offcanvas-card">
                <div class="codex-offcanvas-card-label text-uppercase fw-semibold"><?php esc_html_e('Shopping bag', 'rap'); ?></div>
                <div class="codex-offcanvas-card-content codex-offcanvas-cart">
                    <?php do_action('adstm_cart_quantity_link'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<header class="codex-header position-sticky top-0 w-100 bg-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-xl codex-header-container d-flex align-items-center gap-4 flex-nowrap">
            <button class="navbar-toggler d-lg-none order-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#codexOffcanvas" aria-controls="codexOffcanvas" aria-label="<?php esc_attr_e( 'Toggle navigation', 'rap' ); ?>">
                <span class="navbar-toggler-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" focusable="false" role="presentation">
                        <path d="M5 7h14M5 12h14M5 17h14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </span>
            </button>
            <div class="codex-brand flex-shrink-0 order-2 order-lg-1">
                <?php do_action('adstm_logo_header'); ?>
            </div>
            <div class="codex-main-nav d-none d-lg-flex flex-grow-1 justify-content-center order-lg-2">
                <?php
                if($desktop_menu){
                    echo $desktop_menu;
                } else {
                    ob_start();
                    do_action('ads_pages_menu');
                    $fallback_desktop_menu = ob_get_clean();
                    echo '<div class="codex-fallback-menu">' . $fallback_desktop_menu . '</div>';
                }
                ?>
            </div>
            <div class="d-flex align-items-center gap-2 ms-lg-auto flex-shrink-0 order-3 codex-header-actions">
                <a class="btn btn-dark codex-start-btn codex-header-cta d-lg-none" href="<?php echo esc_url( home_url('/contact-us') ); ?>"><?php esc_html_e('Start For Free', 'rap'); ?></a>
                <div class="codex-header-icons d-none d-lg-flex align-items-center gap-3">
                <?php if(cz('tp_currency_switcher')){ ?>
                    <div class="codex-currency-switcher">
                        <?php do_action('adstm_dropdown_currency'); ?>
                    </div>
                <?php } ?>
                <a class="btn btn-outline-secondary btn-icon" href="<?php echo esc_url($account_url); ?>">
                    <span class="visually-hidden"><?php _e('Account', 'rap'); ?></span>
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5zm0 2c-4 0-7 2-7 4.44V21a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.56C19 16 16 14 12 14z"/></svg>
                </a>
                <div class="codex-cart-link">
                    <?php do_action('adstm_cart_quantity_link'); ?>
                </div>
                <a class="btn btn-dark codex-start-btn codex-header-cta d-none d-lg-inline-flex" href="<?php echo esc_url( home_url('/contact-us') ); ?>"><?php esc_html_e('Start For Free', 'rap'); ?></a>
                </div>
            </div>
        </div>
    </nav>
</header>

<?php get_template_part( 'template/str_data_common' ); ?>
<main id="site-content" class="site-content">
