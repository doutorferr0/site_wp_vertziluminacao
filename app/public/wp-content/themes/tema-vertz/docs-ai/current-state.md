# current-state

## Fase atual
Templates e componentes funcionais concluídos. Ajustando header/logo. Imagens e copy reais ainda não inseridos.

## Arquivos do tema
- front-page.php, page-sobre.php, page-servicos.php, page-contato.php, page-politica-de-privacidade.php
- header.php, footer.php, functions.php
- assets/css/vertz.css (~2800 linhas)
- assets/js/vertz.js (~600 linhas)
- docs-ai/ (este diretório)

## Header — estado atual
- Logo: position:fixed, independente do header
- is-top: logo top:37.5vh, width:575px, left:2rem; header height:50vh, transparente, nav flex-end
- is-scrolled: logo top:0.6rem, width:150px, left:1rem; header fundo #18181A 97%
- Animações: 1s cubic-bezier(0.25,1,0.35,1)
- vertz_customizer_css() removida — variáveis controladas só em vertz.css
- width="320" removido do img em header.php

## Componentes implementados
- Sticky header (scroll direction aware: esconde ao descer, aparece ao subir)
- FAB: WhatsApp + click-to-call
- Cookie banner LGPD (localStorage)
- Lead capture slide-in (60% scroll ou exit intent)
- Hero: vídeo + círculo giratório + relógio JS
- Galeria home: botões Residencial/Comercial trocam imagem
- Formulário contato: nonce + sanitização + wp_mail

## Imagens pendentes (assets/images/)
logo.png, hero-video.mp4, hero-poster.jpg, gallery-01/02.jpg,
produto-residencial/comercial.jpg, features-destaque.jpg, contato-foto.jpg,
logo-parceiro-01 a 05.svg, servicos-hero.jpg, servico-*.jpg,
sobre-hero/missao/galeria-01/02/03.jpg, contato-banner.jpg, razoes-01 a 10.gif

## Paleta CSS
--color-bg:#F4F1EA, --color-surface:#E3DDD6, --color-dark:#2B2B2B,
--color-header-bg:#18181A, --color-primary:#FFC107, --color-primary-hover:#F9E076,
--color-premium:#800020, --color-copper:#8A3B02, --color-accent:#A52A2A
