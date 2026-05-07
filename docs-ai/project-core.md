# project-core

## Projeto
Site WordPress custom para Vertz Iluminação (Campinas/SP). Alta conversão, estética luxo.

## Stack
WordPress PHP 8.3 + MySQL 8.0 + Carbon Fields + CSS/JS vanilla + Swiper.js
Docker (dev) + Hostinger (prod) + VS Code via WSL Ubuntu

## Ambiente
- Tema: /home/doutorferro/tema-vertz/
- Docker compose: /home/doutorferro/docker-vertz/
- Site local: http://localhost:8080
- phpMyAdmin: http://localhost:8081
- Repo: https://github.com/doutorferr0/site_wp_vertziluminacao
- Token: salvo na memoria do Claude (nao commitado)

## Fluxo
- Claude edita via Windows-MCP em \\wsl.localhost\Ubuntu\home\doutorferro\tema-vertz\
- Mudanças aparecem instantaneamente em localhost:8080 (volume montado)
- Usuario faz gup para commitar no GitHub

## Aliases (.zshrc)
- vertz      → cd /home/doutorferro/tema-vertz && code .
- gup        → git add -A && git commit -m "update" && git push origin main
- vertz-up   → docker compose up -d (iniciar ambiente)
- vertz-down → docker compose down (parar ambiente)

## Quando rodar vertz-up
Toda vez que reiniciar o PC ou WSL. Com restart:unless-stopped os containers
sobem automaticamente quando Docker Desktop inicia.

## Tema
Pasta: /home/doutorferro/tema-vertz/
CSS: assets/css/vertz.css | JS: assets/js/vertz.js
Imagens: assets/images/{logo,hero,videos,projetos,razoes,parceiros,nav}/
