# current-state

## Fase atual
Site com home + páginas internas funcionais. Carbon Fields instalado. Archive de projetos com sticky card stack criado. Imagens físicas ainda em subpastas pendentes de mover.

## Páginas criadas
- Home (front-page.php)
- Sobre (page-sobre.php)
- Serviços (page-servicos.php)
- Contato (page-contato.php)
- Iluminação Técnica (page-iluminacao-tecnica.php)
- Iluminação Decorativa (page-iluminacao-decorativa.php)
- Archive Projetos (archive-projeto.php)

## Seções da home (ordem ativa)
1. Hero — fullscreen video/imagem, logo animado grande→pequeno (só home)
2. Parceiros — ticker infinito, 10 logos, fade nas bordas, 70px
3. Galeria — texto esquerda + imagem direita, tabs Residencial/Comercial/Paisagismo
4. 9 Razões — swiper horizontal sem loop, scrollbar neon vermelha, gifrazoes1-9.png
5. CTA — conversão final

## Header
- Pill nav com sliding background
- 117px altura scrolled, logo 156px centralizado verticalmente
- Transparente no is-top (hero home), cinza #0F0F0F 75% ao scrollar
- Aparece ao mover mouse nos 150px do topo
- is-top apenas na home (body.home)
- Outras páginas: is-scrolled imediato ao carregar

## Scroll
- LERP smooth scroll (ease 0.048, deltaY 0.65) — sem touch
- Snap por proximidade: threshold 40% viewport, timer 600ms

## Carbon Fields
- Instalado via Composer (htmlburger/carbon-fields)
- inc/carbon-fields.php registra todos os campos
- Helper vf() em functions.php abstrai leitura de campos
- vendor/ não commitado (só composer.json + composer.lock)

## Archive Projetos
- archive-projeto.php — CPT projetos com sticky card stack
- assets/css/projetos.css — CSS puro, z-index crescente por card
- Cada card: sticky top=headerH, 30vh altura, desliza sobre anterior
- Filtros por categoria no topo

## Imagens
- Paths reorganizados em subpastas no PHP
- Arquivos físicos ainda na raiz assets/images/ — precisam ser movidos
