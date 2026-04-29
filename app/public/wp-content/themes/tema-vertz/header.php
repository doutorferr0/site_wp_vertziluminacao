<?php get_header(); // Este arquivo É o header ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="nav-overlay" aria-hidden="true"></div>
<div class="site-loader position-fixed t-0 l-0 w-100 z-10000 bg-color-white" aria-hidden="true" data-site-loader></div>
<div class="site-transition position-fixed t-0 l-0 w-100 z-10000 bg-color-white visibility-hidden pointer-events-none" aria-hidden="true" data-site-transition></div>
<div data-windmill="wrapper">
<div data-windmill="container" data-ui="gform">
<header class="site-header position-fixed z-9000 t-0 l-0 w-100 pointer-events-none">
  <div class="site-header__wrap container-fluid d-flex justify-content-between align-items-center w-100">

    <figure class="site-header__logo m-0 p-0 pointer-events-all" role="banner">
      <a class="site-header__logoLink d-block w-100 color-current td-none" href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="<?php bloginfo('name'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo.png"
             alt="Vertz Iluminação"
             loading="eager" decoding="async"
             style="display:block;height:auto;object-fit:contain;">
      </a>
    </figure>

    <figure class="site-header__logoHeader m-0 p-0 pointer-events-all" aria-hidden="true">
      <a class="d-block td-none" href="<?php echo esc_url(home_url('/')); ?>" rel="home" tabindex="-1">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logoheader.png"
             alt="Vertz Iluminação"
             loading="eager" decoding="async"
             style="display:block;height:auto;object-fit:contain;">
      </a>
    </figure>

    <nav class="site-header__rightNav pointer-events-all">
      <ul class="site-header__rightMenu list-none m-0 p-0 d-flex align-items-center grid-gap-15 grid-gap-xl-20">
        <li>
          <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn --cta --cta-default fw-500" aria-label="Fale Conosco">
            <span class="btn__bg" aria-hidden="true"></span>
            <span class="btn__label" aria-hidden="true"><span>Fale Conosco</span><span>Fale Conosco</span></span>
          </a>
        </li>
        <li class="d-none d-md-block">
          <nav class="site-header__pillNav" aria-label="Menu principal">
            <div class="site-header__pillBg" aria-hidden="true"></div>
            <?php
            $nav_items = [
              ['url' => home_url('/'),          'label' => 'Home'],
              ['url' => home_url('/projetos'),  'label' => 'Projetos'],
              ['url' => home_url('/servicos'),  'label' => 'Serviços'],
              ['url' => home_url('/sobre'),     'label' => 'Sobre'],
              ['url' => home_url('/contato'),   'label' => 'Contato'],
            ];
            foreach ($nav_items as $item):
            ?>
            <a href="<?php echo esc_url($item['url']); ?>" class="site-header__pillLink">
              <?php echo esc_html($item['label']); ?>
            </a>
            <?php endforeach; ?>
          </nav>
        </li>
        <li class="d-md-none">
          <button class="site-header__burger position-relative m-0 p-0" aria-controls="site-nav" aria-expanded="false" aria-label="Menu">
            <span aria-hidden="true"></span><span aria-hidden="true"></span><span aria-hidden="true"></span>
          </button>
        </li>
      </ul>
    </nav>

  </div>
</header>
<div class="site-header__spacer w-100 visibility-hidden" aria-hidden="true"></div>
<div id="site-nav" class="site-nav d-md-none position-fixed z-6000 t-0 l-0 w-100 vh-100 overflow-clip" aria-hidden="true" data-ui="site-nav">
  <div class="site-nav__backdrop position-absolute t-0 l-0 w-100 h-100" aria-hidden="true" aria-controls="site-nav"></div>
  <div class="site-nav__container position-relative container-fluid w-100 d-flex flex-column pt-100 pb-30 bg-color-white">
    <nav class="site-nav__nav position-relative" role="navigation">
      <?php wp_nav_menu(array('theme_location'=>'primary','container'=>false,'menu_class'=>'site-nav__menu fz-16 list-none m-0 p-0')); ?>
    </nav>
  </div>
</div>
<main class="flex-grow-1" role="main">

