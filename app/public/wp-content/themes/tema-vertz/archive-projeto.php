<?php
/**
 * archive-projeto.php — Vertz Iluminação
 * Layout focal: projeto atual em destaque, anterior/próximo como faixas.
 * Navegação por setas ↑↓. Máx. 3 slots visíveis.
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
            'title'       => get_the_title(),
            'permalink'   => get_permalink(),
            'images'      => array_slice( $imgs, 0, 3 ),
            'papel'       => vf( 'projeto_papel',       $pid ) ?: '',
            'area'        => vf( 'projeto_area',        $pid ) ?: '',
            'localizacao' => vf( 'projeto_localizacao', $pid ) ?: '',
            'ano'         => vf( 'projeto_ano',         $pid ) ?: '',
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
    <span class="pj-adj__arr">↑</span>
    <span class="pj-adj__num" id="pj-prev-num">01</span>
    <span class="pj-adj__title" id="pj-prev-title">–</span>
  </div>

  <!-- Card principal -->
  <div class="pj-slot pj-slot--current" id="pj-current">
    <a class="pj-cur__link" id="pj-cur-link" href="#">

      <div class="pj-cur__imgs" id="pj-cur-imgs">
        <!-- preenchido via JS -->
      </div>

      <div class="pj-cur__bar">
        <div class="pj-cur__bar-left">
          <span class="pj-cur__num"  id="pj-cur-num">01</span>
          <h2 class="pj-cur__title" id="pj-cur-title">–</h2>
        </div>
        <div class="pj-cur__bar-meta">
          <span id="pj-cur-papel"></span>
          <span id="pj-cur-local"></span>
          <span id="pj-cur-area"></span>
          <span id="pj-cur-ano"></span>
        </div>
        <span class="pj-cur__cta">Ver projeto ↗</span>
      </div>

    </a>
  </div>

  <!-- Faixa próximo -->
  <div class="pj-slot pj-slot--adj pj-slot--next is-hidden" id="pj-next" role="button" tabindex="0">
    <span class="pj-adj__num" id="pj-next-num">02</span>
    <span class="pj-adj__title" id="pj-next-title">–</span>
    <span class="pj-adj__arr">↓</span>
  </div>

  <!-- Setas fixas -->
  <nav class="pj-nav" aria-label="Navegar projetos">
    <button class="pj-nav__btn" id="pj-up"   aria-label="Anterior">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <line x1="12" y1="19" x2="12" y2="5"/><polyline points="5,12 12,5 19,12"/>
      </svg>
    </button>
    <span class="pj-nav__count">
      <b id="pj-cnt">1</b><span>/<?php echo $total; ?></span>
    </span>
    <button class="pj-nav__btn" id="pj-down" aria-label="Próximo">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
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
  var elPrevNum   = document.getElementById('pj-prev-num');
  var elPrevTitle = document.getElementById('pj-prev-title');
  var elNextNum   = document.getElementById('pj-next-num');
  var elNextTitle = document.getElementById('pj-next-title');
  var elCurLink   = document.getElementById('pj-cur-link');
  var elCurImgs   = document.getElementById('pj-cur-imgs');
  var elCurNum    = document.getElementById('pj-cur-num');
  var elCurTitle  = document.getElementById('pj-cur-title');
  var elCurPapel  = document.getElementById('pj-cur-papel');
  var elCurLocal  = document.getElementById('pj-cur-local');
  var elCurArea   = document.getElementById('pj-cur-area');
  var elCurAno    = document.getElementById('pj-cur-ano');
  var elCnt       = document.getElementById('pj-cnt');
  var btnUp       = document.getElementById('pj-up');
  var btnDown     = document.getElementById('pj-down');

  function pad(n){ return String(n).padStart(2,'0'); }

  // Ajusta altura do stage ao header
  function setStageTop(){
    var hdr = document.querySelector('.site-header, header');
    var h   = hdr ? hdr.offsetHeight : 0;
    var stage = document.getElementById('pj-stage');
    if (stage) {
      stage.style.paddingTop = h + 'px';
      stage.style.height     = '100vh';
      stage.style.boxSizing  = 'border-box';
    }
  }
  setStageTop();
  window.addEventListener('resize', setStageTop);

  function render(){
    var p = ITEMS[idx];

    // Current
    elCurLink.href          = p.permalink;
    elCurNum.textContent    = pad(idx + 1);
    elCurTitle.textContent  = p.title;
    elCurPapel.textContent  = p.papel || '';
    elCurLocal.textContent  = p.localizacao || '';
    elCurArea.textContent   = p.area || '';
    elCurAno.textContent    = p.ano || '';
    elCnt.textContent       = pad(idx + 1);

    // Imagens
    elCurImgs.innerHTML = '';
    if (p.images && p.images.length){
      p.images.forEach(function(src){
        var img = document.createElement('img');
        img.src = src; img.alt = ''; img.loading = 'lazy'; img.decoding = 'async';
        elCurImgs.appendChild(img);
      });
    } else {
      var ph = document.createElement('div');
      ph.className = 'pj-cur__no-img';
      elCurImgs.appendChild(ph);
    }

    // Prev
    if (idx > 0){
      var pp = ITEMS[idx - 1];
      elPrevNum.textContent   = pad(idx);
      elPrevTitle.textContent = pp.title;
      elPrev.classList.remove('is-hidden');
    } else {
      elPrev.classList.add('is-hidden');
    }

    // Next
    if (idx < total - 1){
      var pn = ITEMS[idx + 1];
      elNextNum.textContent   = pad(idx + 2);
      elNextTitle.textContent = pn.title;
      elNext.classList.remove('is-hidden');
    } else {
      elNext.classList.add('is-hidden');
    }

    btnUp.disabled   = idx === 0;
    btnDown.disabled = idx === total - 1;
  }

  function go(dir){
    var next = idx + dir;
    if (next < 0 || next >= total) return;

    elCurrent.classList.add(dir > 0 ? 'exit-up' : 'exit-down');
    setTimeout(function(){
      idx = next;
      render();
      elCurrent.classList.remove('exit-up','exit-down');
      elCurrent.classList.add('enter');
      setTimeout(function(){ elCurrent.classList.remove('enter'); }, 300);
    }, 200);
  }

  btnUp.addEventListener('click',   function(){ go(-1); });
  btnDown.addEventListener('click', function(){ go(1);  });
  elPrev.addEventListener('click',  function(){ go(-1); });
  elNext.addEventListener('click',  function(){ go(1);  });

  elPrev.addEventListener('keydown', function(e){ if(e.key==='Enter') go(-1); });
  elNext.addEventListener('keydown', function(e){ if(e.key==='Enter') go(1);  });

  document.addEventListener('keydown', function(e){
    if (e.key === 'ArrowUp')   go(-1);
    if (e.key === 'ArrowDown') go(1);
  });

  render();
})();
</script>

<?php get_footer(); ?>
