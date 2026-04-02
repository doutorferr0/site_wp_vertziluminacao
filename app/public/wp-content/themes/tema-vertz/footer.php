</main>
<footer class="site-footer position-relative" data-ui="site-footer">
  <div class="site-footer__stickyWrapper position-relative d-flex align-items-end">
    <div class="site-footer__wrapper container-fluid d-grid grid-column-4 grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20 row-gap-0 position-relative pt-20 pb-20 pb-md-40">
      <div class="site-footer__headlineWrap d-flex flex-column grid-gap-20 grid-gap-xl-30 col-span-4 col-span-md-5 col-span-xl-10">
        <p class="site-footer__headlineLabel position-relative m-0 fz-12 fz-xl-14 lh-150 tt-uppercase"><?php bloginfo('name'); ?></p>
        <p class="site-footer__headline m-0 fz-18 fz-md-20 fz-xl-28 lh-121">Lorem ipsum dolor sit amet, soluções em iluminação que transformam ambientes e experiências.</p>
      </div>
      <div class="site-footer__contactWrap site-footer__section d-flex flex-column grid-gap-md-20 col-start-md-7 col-start-xl-13 col-span-4 col-span-md-4 col-span-xl-8 mt-30 mt-md-0">
        <p class="site-footer__label m-0 fz-12 fz-xl-14 tt-uppercase">Contato</p>
        <div class="wysiwyg fz-14 fz-xl-16 lh-142">
          <p><a href="mailto:contato@vertziluminacao.com.br">contato@vertziluminacao.com.br</a></p>
        </div>
      </div>
      <div class="site-footer__socialWrap site-footer__section d-flex flex-column grid-gap-md-20 col-start-md-11 col-start-xl-23 col-span-4 col-span-md-2 mt-30 mt-md-0">
        <p class="site-footer__label m-0 fz-12 fz-xl-14 tt-uppercase">Siga-nos</p>
        <ul class="list-none m-0 p-0 d-flex flex-column fz-14 fz-xl-16 lh-142">
          <li><a href="https://www.instagram.com/" target="_blank" rel="noopener">Instagram</a></li>
          <li><a href="https://www.linkedin.com/" target="_blank" rel="noopener">LinkedIn</a></li>
        </ul>
      </div>
      <div class="site-footer__termsWrap d-flex flex-column row-start-md-2 align-self-md-end col-start-md-5 col-start-xl-13 col-span-4 col-span-md-8 col-span-xl-12">
        <nav class="site-footer__terms fz-14 fz-md-13 lh-142 pt-20 pt-md-0">
          <ul class="list-none m-0 p-0 d-flex flex-column flex-md-row justify-content-md-between align-items-start align-items-md-end">
            <li class="d-none d-md-block">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?></li>
            <li><a href="<?php echo esc_url(home_url('/politica-de-privacidade')); ?>">Política de privacidade</a></li>
          </ul>
        </nav>
      </div>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-footer__logo row-start-md-2 col-span-4 col-span-md-4 col-span-xl-10 d-block mt-30 mt-md-0" data-scroll data-scroll-offset="20%,100%" data-scroll-progress data-scroll-target=".site-footer">
        <div style="width:157px;height:53px;background:#ccc;display:flex;align-items:center;justify-content:center;font-size:12px;color:#666;">LOGO</div>
      </a>
      <p class="site-footer__copyright d-block d-md-none m-0 fz-13 lh-137 row-start-md-2 col-start-xl-13 col-span-2 col-span-xl-4 mt-15 mt-md-0">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </div>
  </div>
</footer>
</div>
</div>

<!-- ============================================================
  FAB — Floating Action Buttons
============================================================ -->
<div class="site-fab">
  <a href="https://wa.me/5511999999999?text=Ol%C3%A1%2C%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es%20sobre%20ilumina%C3%A7%C3%A3o."
     class="site-fab__btn site-fab__btn--wa"
     target="_blank" rel="noopener noreferrer"
     aria-label="WhatsApp"
     data-label="WhatsApp">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.135.561 4.14 1.541 5.875L0 24l6.305-1.516A11.943 11.943 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.796 9.796 0 01-5.021-1.381l-.36-.214-3.737.979.996-3.648-.235-.374A9.796 9.796 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg>
  </a>
  <a href="tel:+5511999999999"
     class="site-fab__btn site-fab__btn--tel"
     aria-label="Ligar agora"
     data-label="Ligar">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
  </a>
</div>

<!-- ============================================================
  COOKIE BANNER — LGPD (Lei 13.709/2018)
============================================================ -->
<div class="site-cookies" id="site-cookies" role="alert" aria-live="polite" aria-atomic="true" hidden>
  <div class="site-cookies__inner container-fluid">
    <p class="site-cookies__text fz-13 m-0">
      Utilizamos cookies essenciais para o funcionamento do site. Com seu consentimento, também utilizamos cookies de desempenho para melhorar sua experiência. Seus dados são tratados conforme a
      <a href="<?php echo esc_url( home_url('/politica-de-privacidade') ); ?>">LGPD</a>.
    </p>
    <div class="site-cookies__actions">
      <button class="site-cookies__reject" data-cookie-reject>Recusar opcionais</button>
      <button class="site-cookies__accept" data-cookie-accept>Aceitar todos</button>
    </div>
  </div>
</div>

<!-- ============================================================
  LEAD CAPTURE — Slide-in (scroll 60% ou exit intent)
============================================================ -->
<div class="site-lead" id="site-lead" aria-hidden="true" hidden>
  <div class="site-lead__inner">
    <button class="site-lead__close" data-lead-close aria-label="Fechar painel">&#215;</button>
    <span class="site-lead__accent" aria-hidden="true"></span>
    <p class="fz-11 tt-uppercase m-0" style="color:var(--color-gray-600)">Orçamento rápido</p>
    <h3 class="fz-22 fw-400 lh-120 m-0 mt-12">Receba uma proposta <span class="title-highlight --font-heading --fs-italic">personalizada.</span></h3>
    <form class="site-lead__form d-grid grid-gap-12"
          action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"
          method="POST"
          novalidate>
      <?php wp_nonce_field( 'vertz_optin_nonce', 'vertz_optin_nonce_field' ); ?>
      <input type="hidden" name="action" value="vertz_optin">
      <input type="text"  name="nome"  placeholder="Seu nome"  required class="pb-row-contato__input" autocomplete="name">
      <input type="email" name="email" placeholder="Seu e-mail" required class="pb-row-contato__input" autocomplete="email">
      <select name="tipo" class="pb-row-contato__input pb-row-contato__select">
        <option value="">Tipo de projeto</option>
        <option value="residencial">Residencial</option>
        <option value="comercial">Comercial</option>
        <option value="corporativo">Corporativo</option>
        <option value="industrial">Industrial</option>
        <option value="consultoria">Consultoria / Projeto</option>
      </select>
      <button type="submit" class="btn --cta --cta-default" style="justify-content:center;width:100%;">
        <span class="btn__bg" aria-hidden="true"></span>
        <span class="btn__label" aria-hidden="true"><span>Solicitar orçamento</span><span>Solicitar orçamento</span></span>
      </button>
      <p class="site-lead__lgpd">&#128274; Seus dados são protegidos conforme a LGPD e nunca serão compartilhados.</p>
    </form>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
