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
- Claude edita via GitHub API
- Usuario faz git pull origin main para puxar
- Usuario faz gup para enviar alteracoes locais

## Metodo de edicao
- GitHub API: metodo padrao para edicao de codigo (mais eficiente em tokens)
- Windows-MCP: apenas leitura pontual quando necessario
- Nunca usar bash_tool ou filesystem para edicoes — gasta mais tokens

## Aliases (.zshrc)
- vertz      -> cd /home/doutorferro/tema-vertz && code .
- gup        -> git add -A && git commit -m "update" && git push origin main
- vertz-up   -> docker compose up -d
- vertz-down -> docker compose down

## Tema
CSS: assets/css/vertz.css | JS: assets/js/vertz.js
Imagens: assets/images/{logo,hero,videos,projetos,razoes,parceiros,nav}/
