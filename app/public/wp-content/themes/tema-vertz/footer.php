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
<?php wp_footer(); ?>
</body>
</html>
