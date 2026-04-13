<?php
/**
 * Template Name: Contato
 * page-contato.php — Vertz Iluminação
 */
get_header();
$theme_uri = get_template_directory_uri();

// Dados globais de contato (ACF options)
$wa      = vf('contato_whatsapp',         'option', '5519999778710');
$tel     = vf('contato_telefone',          'option', '(19) 3251-0501');
$email   = vf('contato_email',             'option', 'contato@vertziluminacao.com.br');
$ig      = vf('contato_instagram',         'option', 'vertziluminacao');
$adc     = vf('contato_endereco_campinas', 'option', 'R. Antônio Lapa, 328 — Cambuí');
$adsp    = vf('contato_endereco_sp',       'option', 'Alameda Casa Branca, 806 — Jardim Paulista');
$horario = vf('contato_horario',           'option', 'Seg–Sex 9h–18h / Sáb 9h–13h');

// Campos desta página
$titulo_pagina   = vf('contato_titulo',  false, 'Vamos conversar.');
$banner_img      = vf('contato_banner',  false, $theme_uri . '/assets/images/contato-banner.jpg');
?>

<div class="single single-page" id="page-contato">

  <!-- ============================================================
    SEÇÃO 1: PAGE HEADING — Título simples (sem imagem de fundo)
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-120 pb-60 pt-md-160 pb-md-80 pt-xl-200 pb-xl-100 mt-0 mb-0 --first" style="--zindex:1">
    <div class="pb-row container-fluid" data-scroll data-scroll-offset="80px,0" data-module-delay>

      <p class="fz-12 tt-uppercase m-0 mb-20 mb-md-30">Entre em contato</p>
      <h1 class="ff-body fz-40 fz-md-64 fz-xl-96 fw-400 lh-none ls--4 m-0"
        data-splitting="charsWrapped"
      ><?php echo esc_html(rtrim($titulo_pagina, '.')); ?><span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0">.</span></h1>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 2: SPLIT — Formulário + informações
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-60 pb-80 pt-md-80 pb-md-120 pt-xl-100 pb-xl-160 mt-0 mb-0" style="--zindex:2">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20 align-items-start"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <!-- COLUNA ESQUERDA: Informações de contato -->
      <div class="pb-row-contato__info col-start-1 col-span-md-5 col-span-xl-9 d-flex flex-column grid-gap-40 grid-gap-xl-60 mb-60 mb-md-0">

        <div class="d-flex flex-column grid-gap-15">
          <p class="fz-12 tt-uppercase m-0">E-mail</p>
          <a href="mailto:<?php echo esc_attr($email); ?>" class="fz-18 fz-xl-22 fw-400 lh-120 td-none color-current">
            <?php echo esc_html($email); ?>
          </a>
        </div>

        <div class="d-flex flex-column grid-gap-15">
          <p class="fz-12 tt-uppercase m-0">Telefone / WhatsApp</p>
          <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Ol%C3%A1%2C%20vim%20atrav%C3%A9s%20do%20site%20e%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es." target="_blank" rel="noopener" class="fz-18 fz-xl-22 fw-400 lh-120 td-none color-current">
            (19) 9 9977-8710 — WhatsApp
          </a>
        </div>

        <div class="d-flex flex-column grid-gap-15">
          <p class="fz-12 tt-uppercase m-0">Telefone fixo</p>
          <a href="tel:+551932510501" class="fz-18 fz-xl-22 fw-400 lh-120 td-none color-current">
            <?php echo esc_html($tel); ?>
          </a>
        </div>

        <div class="d-flex flex-column grid-gap-15">
          <p class="fz-12 tt-uppercase m-0">Endereço</p>
          <address class="fz-16 fz-xl-18 lh-150 not-italic m-0">
            Campinas: <?php echo esc_html($adc); ?><br>Campinas, SP<br><br>São Paulo: <?php echo esc_html($adsp); ?><br>São Paulo, SP
          </address>
        </div>

        <div class="d-flex flex-column grid-gap-15">
          <p class="fz-12 tt-uppercase m-0">Siga-nos</p>
          <ul class="list-none m-0 p-0 d-flex flex-column grid-gap-8">
            <li>
              <a href="https://www.instagram.com/<?php echo esc_attr($ig); ?>/" target="_blank" rel="noopener" class="fz-16 fz-xl-18 td-none color-current d-flex align-items-center grid-gap-10">
                @<?php echo esc_html($ig); ?> →
              </a>
            </li>
            <li>
              <a href="https://www.linkedin.com/company/vertziluminacao/" target="_blank" rel="noopener" class="fz-16 fz-xl-18 td-none color-current d-flex align-items-center grid-gap-10">
                LinkedIn →
              </a>
            </li>
          </ul>
        </div>

        <div class="d-flex flex-column grid-gap-15">
          <p class="fz-12 tt-uppercase m-0">Horário de atendimento</p>
          <p class="fz-14 fz-xl-16 lh-150 m-0">
            <?php echo nl2br(esc_html($horario)); ?><br>Dom: Fechado
          </p>
        </div>

      </div>

      <!-- COLUNA DIREITA: Formulário -->
      <div class="pb-row-contato__form col-start-1 col-start-md-7 col-span-md-6 col-span-xl-13">

        <?php
        /*
         * Substituir pelo shortcode do plugin de formulário instalado.
         * Contact Form 7:  echo do_shortcode('[contact-form-7 id="SEU_ID" title="Contato"]');
         * WPForms:         echo do_shortcode('[wpforms id="SEU_ID"]');
         * Gravity Forms:   echo do_shortcode('[gravityforms id="SEU_ID"]');
         */

        // Formulário HTML nativo como fallback (funcional via functions.php wp_mail)
        if ( isset( $_GET['enviado'] ) && $_GET['enviado'] === '1' ) : ?>

          <div class="pb-row-contato__success d-flex flex-column grid-gap-20 pt-40 pb-40" role="alert">
            <p class="fz-12 tt-uppercase m-0 color-red">Mensagem enviada ✓</p>
            <p class="fz-20 fz-xl-28 fw-400 lh-120 m-0">Recebemos sua mensagem. Nossa equipe retorna em até 24 horas úteis.</p>
          </div>

        <?php else : ?>

          <form
            class="pb-row-contato__formEl d-grid grid-gap-20 grid-gap-xl-30"
            action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"
            method="POST"
            novalidate>

            <?php wp_nonce_field( 'vertz_contato_nonce', 'vertz_nonce' ); ?>
            <input type="hidden" name="action" value="vertz_contato">

            <div class="pb-row-contato__field d-grid grid-gap-8">
              <label class="fz-12 tt-uppercase" for="campo-nome">Nome completo *</label>
              <input
                type="text"
                id="campo-nome"
                name="nome"
                required
                autocomplete="name"
                class="pb-row-contato__input fz-16 w-100"
                placeholder="Seu nome">
            </div>

            <div class="pb-row-contato__field d-grid grid-gap-8">
              <label class="fz-12 tt-uppercase" for="campo-email">E-mail *</label>
              <input
                type="email"
                id="campo-email"
                name="email"
                required
                autocomplete="email"
                class="pb-row-contato__input fz-16 w-100"
                placeholder="seu@email.com.br">
            </div>

            <div class="pb-row-contato__field d-grid grid-gap-8">
              <label class="fz-12 tt-uppercase" for="campo-telefone">Telefone / WhatsApp</label>
              <input
                type="tel"
                id="campo-telefone"
                name="telefone"
                autocomplete="tel"
                class="pb-row-contato__input fz-16 w-100"
                placeholder="(00) 00000-0000">
            </div>

            <div class="pb-row-contato__field d-grid grid-gap-8">
              <label class="fz-12 tt-uppercase" for="campo-tipo">Tipo de projeto</label>
              <select
                id="campo-tipo"
                name="tipo"
                class="pb-row-contato__input pb-row-contato__select fz-16 w-100">
                <option value="">Selecione uma opção</option>
                <option value="residencial">Residencial</option>
                <option value="comercial">Comercial</option>
                <option value="corporativo">Corporativo</option>
                <option value="industrial">Industrial</option>
                <option value="projeto-especial">Projeto especial</option>
                <option value="consultoria">Consultoria / Projeto luminotécnico</option>
                <option value="outro">Outro</option>
              </select>
            </div>

            <div class="pb-row-contato__field d-grid grid-gap-8">
              <label class="fz-12 tt-uppercase" for="campo-mensagem">Mensagem *</label>
              <textarea
                id="campo-mensagem"
                name="mensagem"
                required
                rows="6"
                class="pb-row-contato__input pb-row-contato__textarea fz-16 w-100"
                placeholder="Descreva seu projeto ou dúvida..."></textarea>
            </div>

            <div class="pb-row-contato__field">
              <button type="submit" class="btn --cta --cta-default w-100-md" aria-label="Enviar mensagem">
                <span class="btn__bg" aria-hidden="true"></span>
                <span class="btn__label" aria-hidden="true">Enviar mensagem</span>
              </button>
            </div>

          </form>

        <?php endif; ?>

      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 3: IMAGEM — Visual de fechamento
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0" style="--zindex:3">
    <figure class="m-0 overflow-clip" data-scroll data-scroll-offset="80px,0" data-module-delay>
      <img
        src="<?php echo esc_url( $banner_img ); ?>"
        alt="Vertz Iluminação — Projetos que transformam"
        loading="lazy"
        decoding="async"
        style="width:100%;aspect-ratio:21/9;object-fit:cover;display:block;">
    </figure>
  </div>

</div><!-- /single single-page -->

<?php get_footer(); ?>
