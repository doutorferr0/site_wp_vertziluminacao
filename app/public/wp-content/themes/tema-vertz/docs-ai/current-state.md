# current-state

## Fase atual
Header pill flutuante funcional. Logo hero estático na home.

## Header
- Pill: __wrap com border-radius:999px, backdrop-filter no ::before (evita bug position:fixed)
- Transparência: is-top rgba(12,12,12,0.45) | is-scrolled rgba(12,12,12,0.72)
- padding: 4px | gap: clamp(0.5rem,1vw,0.8rem)
- logo.png: filho direto do header, fora do __wrap, position:fixed top:37.5vh left:2rem width:575px
  - Visível só na .home, sempre visível (sem opacity:0)
- logoheader.png: flex item no __wrap, height:18px, expande no hover do wrap

## Secoes home
1. Hero - video fullscreen, logo.png grande estático
2. Parceiros - ticker infinito
3. Galeria - tabs Residencial/Comercial/Paisagismo
4. 9 Razoes - swiper
5. CTA final

## Archive Projetos
Layout focal card, lightbox, navegação teclado, setas + contador

## Carbon Fields CPT Projeto
Abas: Imagens (Capa/Galeria até 20), Dados, Descricao