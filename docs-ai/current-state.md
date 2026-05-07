# current-state

## Fase atual
Ambiente migrado para Docker. Header dual-pill funcional. Logo hero estático na home.

## Ambiente
- Docker rodando: localhost:8080 (site), localhost:8081 (phpMyAdmin)
- Tema montado como volume: /home/doutorferro/tema-vertz → /var/www/html/wp-content/themes/tema-vertz
- Carbon Fields: composer install executado no container
- Git inicializado em /home/doutorferro/tema-vertz, conectado ao GitHub
- .gitignore: vendor/, composer.phar, assets/images/, arquivos de setup antigos

## Header (estado atual)
- Dois pills independentes, mesma altura (38px)
- Pill esquerda: logoheader.png + Home + Fale Conosco
- Pill direita: Projetos / Serviços / Sobre / Novidades / Contato + burger mobile
- backdrop-filter no ::before (evita bug position:fixed)
- is-top: rgba(12,12,12,0.45) | is-scrolled: rgba(12,12,12,0.72)
- Logo: height:18px, opacity:0.55, full no hover
- Fale Conosco: opacity:0.6, full no hover

## Logo hero (home)
- position:absolute dentro do hero (front-page.php)
- left:2rem; top:37.5%; width:575px; z-index:5

## Botões globais
- border-radius: 6px, box-shadow 3 camadas (depth/3D)
- btn__label: display:block; height/line-height:1.1em; overflow:hidden

## Scroll
- LERP suave (ease:0.048), sem snap/ancoragem

## FAB
- Sempre visível, 60x60px

## Swiper 9 Razões
- freeMode + momentum, sem snap-back

## Páginas
Home, Sobre, Serviços, Contato, Iluminação Técnica, Iluminação Decorativa,
Archive Projetos, Archive Novidades, Single Novidade, Single Projeto

## CPTs
- projeto: galeria, dados técnicos, lightbox
- novidade: título, editor, thumbnail, excerpt, categoria_novidade

## Footer
- logofooter.png grande no topo
- 3 colunas: Contato | Navegação (grid 2col) | Siga-nos
- Linhas divisórias horizontais e verticais
