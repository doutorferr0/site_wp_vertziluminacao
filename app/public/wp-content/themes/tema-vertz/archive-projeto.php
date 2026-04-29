<?php
/**
 * archive-projeto.php — Vertz Iluminação
 * Layout: card focal claro. Atual em destaque, anterior/próximo como faixas.
 * 4 imagens 5:6. Navegação por setas ↑↓.
 */

get_header();

$projetos = new WP_Query([
    'post_type'      => 'projeto',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
]);

$items = [];
if ( $projetos->have_posts() ) {
    while ( $projetos->have_posts() ) {
        $projetos->the_post();
        $pid    = get_the_ID();
        $cover  = vf( 'projeto_cover', $pid );
        if ( ! $cover && has_post_thumbnail() ) {
            $cover = get_the_post_thumbnail_url( $pid, 'large' );
        }
        $galeria = vf( 'projeto_galeria', $pid, [] );
        $imgs    = [];
        if ( $cover ) $imgs[] = $cover;
        foreach ( $galeria as $g ) {
            if ( ! empty( $g['imagem'] ) ) $imgs[] = $g['imagem'];
        }
        $items[] = [
            'title'     => get_the_title(),
            'permalink' => get_permalink(),
            'images'    => array_slice( $imgs, 0, 4 ),
            'funcao'    => vf( 'projeto_papel',       $pid ) ?: '',
            'parceria'  => vf( 'projeto_parceria',    $pid ) ?: '',
            'local'     => vf( 'projeto_localizacao', $pid ) ?: '',
            'ano'       => vf( 'projeto_ano',         $pid ) ?: '',
        ];
    }
    wp_reset_postdata();
}

$total = count( $items );
?>

<main class="pj-stage" id="pj-stage">

<?php if ( $total === 0 ) : ?>
  <div class="pj-stage__empty"><p>Nenhum projeto publicado.</p></div>

<?php else : ?>

  <!-- Faixa anterior -->
  <div class="pj-slot pj-slot--adj pj-slot--prev is-hidden" id="pj-prev" role="button" tabindex="0">
    <span class="pj-adj__title" id="pj-prev-title">–</span>
  </div>

  <!-- Card principal -->
  <div class="pj-slot pj-slot--current" id="pj-current">

    <!-- Cabeçalho: título + colunas meta -->
    <div class="pj-cur__head">
      <h2 class="pj-cur__title" id="pj-cur-title">–</h2>
      <div class="pj-cur__cols">
        <div class="pj-cur__col">
          <span class="pj-cur__col-label">Função</span>
          <span class="pj-cur__col-val" id="pj-cur-funcao">–</span>
        </div>
        <div class="pj-cur__col">
          <span class="pj-cur__col-label">Parceria</span>
          <span class="pj-cur__col-val" id="pj-cur-parceria">–</span>
        </div>
        <div class="pj-cur__col">
          <span class="pj-cur__col-label">Local</span>
          <span class="pj-cur__col-val" id="pj-cur-local">–</span>
        </div>
        <div class="pj-cur__col">
          <span class="pj-cur__col-label">Ano</span>
          <span class="pj-cur__col-val" id="pj-cur-ano">–</span>
        </div>
      </div>
    </div>

    <!-- Imagens 5:6 -->
    <div class="pj-cur__imgs" id="pj-cur-imgs">
      <!-- preenchido via JS -->
    </div>

    <!-- Rodapé: link -->
    <div class="pj-cur__foot">
      <a class="pj-cur__cta" id="pj-cur-link" href="#">
        Veja mais sobre este projeto ↗
      </a>
    </div>

  </div>

  <!-- Faixa próximo -->
  <div class="pj-slot pj-slot--adj pj-slot--next is-hidden" id="pj-next" role="button" tabindex="0">
    <span class="pj-adj__title" id="pj-next-title">–</span>
  </div>

  <!-- Setas fixas -->
  <nav class="pj-nav" aria-label="Navegar projetos">
    <button class="pj-nav__btn" id="pj-up" aria-label="Anterior">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <line x1="12" y1="19" x2="12" y2="5"/><polyline points="5,12 12,5 19,12"/>
      </svg>
    </button>
    <span class="pj-nav__count"><b id="pj-cnt">01</b><span>/<?php printf('%02d', $total); ?></span></span>
    <button class="pj-nav__btn" id="pj-down" aria-label="Próximo">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <line x1="12" y1="5" x2="12" y2="19"/><polyline points="19,12 12,19 5,12"/>
      </svg>
    </button>
  </nav>

<?php endif; ?>

</main>

<script>
(function(){
  var ITEMS = <?php echo wp_json_encode( $items ); ?>;
  var total = ITEMS.length;
  if (!total) return;
  var idx = 0;

  var elPrev      = document.getElementById('pj-prev');
  var elCurrent   = document.getElementById('pj-current');
  var elNext      = document.getElementById('pj-next');
  var elPrevTitle = document.getElementById('pj-prev-title');
  var elNextTitle = document.getElementById('pj-next-title');
  var elCurTitle  = document.getElementById('pj-cur-title');
  var elCurImgs   = document.getElementById('pj-cur-imgs');
  var elCurLink   = document.getElementById('pj-cur-link');
  var elCurFuncao   = document.getElementById('pj-cur-funcao');
  var elCurParceria = document.getElementById('pj-cur-parceria');
  var elCurLocal    = document.getElementById('pj-cur-local');
  var elCurAno      = document.getElementById('pj-cur-ano');
  var elCnt  = document.getElementById('pj-cnt');
  var btnUp  = document.getElementById('pj-up');
  var btnDn  = document.getElementById('pj-down');

  function pad(n){ return String(n).padStart(2,'0'); }

  function setHeight(){
    var hdr = document.querySelector('.site-header, header');
    var h   = hdr ? hdr.offsetHeight : 0;
    var s   = document.getElementById('pj-stage');
    if (s){ s.style.paddingTop = h+'px'; s.style.height = '100vh'; s.style.boxSizing = 'border-box'; }
  }
  setHeight();
  window.addEventListener('resize', setHeight);

  function render(){
    var p = ITEMS[idx];

    elCurTitle.textContent    = p.title;
    elCurFuncao.textContent   = p.funcao   || '–';
    elCurParceria.textContent = p.parceria || '–';
    elCurLocal.textContent    = p.local    || '–';
    elCurAno.textContent      = p.ano      || '–';
    elCurLink.href            = p.permalink;
    elCnt.textContent         = pad(idx + 1);

    // Imagens 5:6
    elCurImgs.innerHTML = '';
    var srcs = p.images && p.images.length ? p.images : [];
    // sempre 4 slots
    for (var i = 0; i < 4; i++){
      var wrap = document.createElement('div');
      wrap.className = 'pj-cur__img-wrap';
      if (srcs[i]){
        var img = document.createElement('img');
        img.src = srcs[i]; img.alt = ''; img.loading = 'lazy'; img.decoding = 'async';
        wrap.appendChild(img);
      } else {
        wrap.classList.add('pj-cur__img-empty');
      }
      elCurImgs.appendChild(wrap);
    }

    // Prev
    if (idx > 0){
      elPrevTitle.textContent = ITEMS[idx-1].title;
      elPrev.classList.remove('is-hidden');
    } else {
      elPrev.classList.add('is-hidden');
    }

    // Next
    if (idx < total-1){
      elNextTitle.textContent = ITEMS[idx+1].title;
      elNext.classList.remove('is-hidden');
    } else {
      elNext.classList.add('is-hidden');
    }

    btnUp.disabled = idx === 0;
    btnDn.disabled = idx === total-1;
  }

  function go(dir){
    var n = idx + dir;
    if (n < 0 || n >= total) return;
    elCurrent.classList.add(dir > 0 ? 'exit-up' : 'exit-down');
    setTimeout(function(){
      idx = n; render();
      elCurrent.classList.remove('exit-up','exit-down');
      elCurrent.classList.add('enter');
      setTimeout(function(){ elCurrent.classList.remove('enter'); }, 300);
    }, 180);
  }

  btnUp.addEventListener('click',  function(){ go(-1); });
  btnDn.addEventListener('click',  function(){ go(1);  });
  elPrev.addEventListener('click', function(){ go(-1); });
  elNext.addEventListener('click', function(){ go(1);  });
  elPrev.addEventListener('keydown', function(e){ if(e.key==='Enter') go(-1); });
  elNext.addEventListener('keydown', function(e){ if(e.key==='Enter') go(1);  });
  document.addEventListener('keydown', function(e){
    if(e.key==='ArrowUp')   go(-1);
    if(e.key==='ArrowDown') go(1);
  });

  render();
})();
</script>

<?php get_footer(); ?>
