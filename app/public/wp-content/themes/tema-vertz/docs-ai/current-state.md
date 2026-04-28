# current-state

## Fase atual
Home funcional com 5 seções ativas. Conflito de merge em functions.php resolvido. Site voltando a funcionar.

## Seções da home (ordem)
1. Hero — fullscreen video/imagem, logo animado grande→pequeno (só home)
2. Parceiros — ticker infinito, 10 logos, fade nas bordas, 70px
3. Galeria — texto esquerda + imagem direita, tabs Residencial/Comercial/Paisagismo
4. 9 Razões — swiper horizontal sem loop, scrollbar neon vermelha, gifrazoes1-9.png
5. CTA — conversão final

## Seções comentadas no front-page.php (para uso futuro)
- Seção 2: Declaração
- Seção 4: Dois Pilares
- Seções 5, 6, 7, 8, 8.5

## Header
- Pill nav com sliding background (estilo kitskinkind.com.au)
- 117px altura scrolled, logo 156px centralizado verticalmente
- Transparente no is-top (hero home), cinza #0F0F0F 75% ao scrollar
- Aparece ao mover mouse nos 150px do topo
- is-top apenas na home (body.home)
- Outras páginas: is-scrolled imediato ao carregar

## Scroll
- LERP smooth scroll (ease 0.048, deltaY 0.65) — sem touch
- Snap por proximidade: threshold 40% viewport, timer 600ms
- Snap points: topo + meio de cada .pb-row-wrapper

## Imagens
- Paths reorganizados em subpastas (logo/, hero/, projetos/, razoes/, parceiros/, nav/, videos/)
- Arquivos físicos precisam ser movidos localmente para as subpastas
