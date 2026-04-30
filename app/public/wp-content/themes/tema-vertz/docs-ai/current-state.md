# current-state

## Fase atual
Header dual-pill funcional. Logo hero estático na home (front-page.php).

## Header (estado atual)
- Dois pills independentes, mesma altura (38px), mesmo estilo
- `.site-header__wrap`: flex container transparente, `width: calc(100% - 2rem)`, `justify-content: space-between`
- Pill esquerda (`.site-header__pill--left`): logoheader.png + botão Fale Conosco
- Pill direita (`.site-header__pill--right`): pill nav (Home/Projetos/Serviços/Sobre/Contato) + burger mobile
- Ambas: `background: rgba(12,12,12,0.65)`, `backdrop-filter: blur(20px)`, `border-radius: 999px`
- is-top: `rgba(12,12,12,0.45)` | is-scrolled: `rgba(12,12,12,0.72)`
- Logo (logoheader.png): `height: 18px`, `opacity: 0.55`, full no hover
- Botão Fale Conosco: `opacity: 0.6`, full no hover

## Logo hero (home)
- Renderizado via `is_front_page()` em front-page.php
- `position:absolute` dentro do hero wrapper (`position:relative`)
- `left:2rem; top:37.5%; width:575px; z-index:5`
- Sem CSS externo — sem bugs de transform/backdrop-filter

## Botões globais
- `border-radius: 6px` (sutil)
- `box-shadow` 3 camadas: inset topo claro + inset base escuro + sombra externa
- Hover: sobe 2px + sombra maior | Active: afunda
- `.btn__label`: `display:block; height/line-height:1.1em; overflow:hidden` — fix do texto duplo visível
- Botão amarelo: `border-bottom` mais escuro + sombra dourada

## FAB (WhatsApp + Telefone)
- Sempre visível: `opacity:1 !important; pointer-events:all !important`
- Tamanho: `60x60px`, ícone `26px`

## Swiper 9 Razões
- `freeMode: enabled, momentum: true` — sem snap-back ao arrastar

## Páginas
Home, Sobre, Serviços, Contato, Iluminação Técnica, Iluminação Decorativa, Archive Projetos

## Archive Projetos
Layout focal card, lightbox, navegação teclado, setas + contador
