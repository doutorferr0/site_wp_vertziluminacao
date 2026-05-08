# project-core

## Projeto
Site WordPress custom para Vertz Iluminação (Campinas/SP). Alta conversão, estética luxo.

## Stack
WordPress PHP 8.3 + MySQL 8.0 + Carbon Fields + CSS/JS vanilla + Swiper.js
Docker (dev) + Hostinger (prod) + VS Code via WSL Ubuntu

## Tipografia
- Metropolis (Fontsource CDN) — corpo, parágrafos, seções sérias (~50%)
- Courier Prime (Google Fonts) — UI, títulos, botões, labels (~40%)
- Cutive Mono (Google Fonts) — micro-textos, anel, itálico de Courier (~10%)
- Regra: nunca misturar Metropolis+Courier no mesmo bloco. Itálico de Courier vira Cutive Mono.

## Imagens
- Formato padrão: WebP (lossy q80 fotos / lossless+alpha q85 ilustrações)
- Conversão: assets/images/convert-webp.sh (cwebp instalado no WSL)
- Lazy loading + decoding async em todas as <img>; fetchpriority="high" no above-the-fold

## Ambiente
- Tema: /home/doutorferro/tema-vertz/
- Docker compose: /home/doutorferro/docker-vertz/
- Site local: http://localhost:8080
- phpMyAdmin: http://localhost:8081
- Repo: https://github.com/doutorferr0/site_wp_vertziluminacao

## Fluxo
- Claude edita via GitHub API (mais eficiente em tokens) ou Windows-MCP em \\wsl.localhost\Ubuntu\home\doutorferro\tema-vertz\
- Mudanças aparecem instantaneamente em localhost:8080 (volume montado)
- Usuario faz git pull origin main para trazer commits remotos, gup para enviar

## Aliases (.zshrc)
- vertz      → cd /home/doutorferro/tema-vertz && code .
- gup        → git add -A && git commit -m "update" && git push origin main
- vertz-up   → docker compose up -d
- vertz-down → docker compose down
- to_webp    → conversão rápida WebP de arquivos individuais

## Tema
Pasta: /home/doutorferro/tema-vertz/
CSS: assets/css/vertz.css | JS: assets/js/vertz.js
Imagens: assets/images/{logo,hero,videos,projetos,razoes,parceiros,nav}/
