# current-state

## Fase atual
Home com 4 seções ativas: Hero → Parceiros → Galeria → 9 Razões (card swiper) → CTA.
Seções 2, 4, 5, 6, 7, 8, 8.5 comentadas no front-page.php.

## O que existe agora
- Header: pill nav com sliding bg, 117px scrolled, logo 156px, mouse proximity show
- Hero: fullscreen com video/imagem, logo animado grande → pequeno (só home)
- Parceiros: ticker infinito com fade nas bordas, 10 parceiros, logos 70px
- Galeria: layout lado a lado — texto esquerda + imagem direita, tabs Residencial/Comercial/Paisagismo
- 9 Razões: swiper horizontal sem loop, scrollbar neon vermelha, imagens gifrazoes1-9.png
- CTA: seção final de conversão
- Smooth scroll LERP (ease 0.048, deltaY 0.65) com snap por proximidade (40% viewport, 600ms)
- Header aparece por mouse proximity (150px do topo)

## Estrutura de imagens reorganizada
assets/images/
├── logo/       → logo.png
├── hero/       → hero-poster.jpg
├── videos/     → hero-video.mp4
├── projetos/   → gallery-0x, sobre-*, servico-*, contato-*
├── razoes/     → gifrazoes1-9.png
├── parceiros/  → parceiro1-10.png
└── nav/        → nav-*.jpg

## Problema atual
Site parou de abrir no Windows após reorganização das pastas de imagens.
Causa provável: paths de imagens atualizados no PHP/CSS mas arquivos físicos não movidos ainda no LocalWP.
