# current-state

## Tipografia
- Fontes: Metropolis + Courier Prime + Cutive Mono (substituiu Inter+Playfair)
- Variáveis CSS: --font-body (Metropolis), --font-display (Courier), --font-mono (Cutive); alias --font-heading → --font-display
- Escala utility: .h1-.h4, .s1-.s3, .b1-.b2, .breadcrumb (escala Kit-style)
- Tokens espaço: --space-page-x, --space-section-sm/md/lg, --space-mobile
- ScaleY 1.06 vertical em Courier (.h1-.h4, razões, btn, labels)
- Guard CSS: .ff-body .title-highlight força Metropolis (anula combo --font-heading)
- Itálico Courier → Cutive Mono (única mistura permitida)
- Pill esquerda do header: Metropolis 500 | Pill direita: Courier 400 maior+leve

## Legibilidade
- --color-gray-600: #949699 → #6B6F73 (contraste WCAG AA 5.5:1)
- --fz-13: 13px → 14px | --fz-14: 14px → 15px
- p.fz-13/14: weight 500 + letter-spacing 0.005em

## Botões
- border-radius: 100px (pill); padding: 9px 40px 8px; font-size: 15px
- Header CTA: 8px 24px 7px / 13px / pill
- Courier 400 uppercase 0.04em

## Header (estado atual)
- Dois pills independentes, mesma altura
- Pill esquerda: logoheader.webp + Home + Fale Conosco
- Pill direita: Projetos / Serviços / Sobre / Novidades / Contato + burger mobile
- pillLink: weight 500, font-size clamp(0.95, 1.05rem), tracking 0.05em

## Imagens
- Todas convertidas para WebP via convert-webp.sh
- Refs PHP atualizadas (.png/.jpg → .webp) em 7 templates, 32 substituições
- <img> com loading + decoding + fetchpriority em todos templates principais

## Logo hero (home)
- position:absolute dentro do hero (front-page.php), left:2rem, top:37.5%, width:575px

## Scroll
- LERP suave (ease:0.048), sem snap/ancoragem

## Páginas
Home, Sobre, Serviços, Contato, Iluminação Técnica, Iluminação Decorativa,
Archive Projetos, Archive Novidades, Single Novidade, Single Projeto

## CPTs
- projeto: galeria, dados técnicos, lightbox
- novidade: título, editor, thumbnail, excerpt, categoria_novidade

## Footer
- logofooter.webp grande no topo
- 3 colunas: Contato | Navegação | Siga-nos
