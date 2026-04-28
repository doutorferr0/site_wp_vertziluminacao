# project-core

## Projeto
Site WordPress custom para Vertz Iluminação — empresa de iluminação técnica e decorativa (Campinas/SP).
Objetivo: site performático, customizado, alta conversão, estética luxo.

## Stack
- WordPress + PHP nativo + Gutenberg + Carbon Fields
- CSS/JS vanilla (sem framework)
- Swiper.js para sliders
- LocalWP (dev local Windows) + Hostinger (produção)
- VS Code via WSL Ubuntu

## Ambiente
- LocalWP: C:\Users\henri\Local Sites\vertziluminacaocombr\app\public
- wp-config: DB_HOST=127.0.0.1:10005, DB_NAME=local, DB_USER=root
- WSL: Ubuntu, shell zsh
- Repo GitHub: https://github.com/doutorferr0/site_wp_vertziluminacao
- Token: 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

## Fluxo de desenvolvimento
- Claude altera arquivos via GitHub API (PUT /contents/)
- Usuário faz `git pull origin main` para puxar as alterações localmente
- Usuário faz `gup` para enviar alterações locais ao GitHub
- REGRA: nunca Claude faz push via API enquanto usuário tem alterações locais não commitadas
- Se conflito: `git checkout -- arquivo` depois `git pull origin main`

## Regras de comunicação
- Homem das cavernas: conciso, técnico, sem enrolação
- Padrão: [objeto] [ação] [motivo]. [próximo passo]
- Código sempre em bloco com label de linguagem
- Commits: Conventional Commits, máx 50 chars, foco no porquê
- Nunca reverter estilo após múltiplos turnos

## Tema
- Pasta: app/public/wp-content/themes/tema-vertz/
- Arquivos principais: functions.php, front-page.php, header.php, footer.php
- CSS: assets/css/vertz.css
- JS: assets/js/vertz.js

## Estrutura de imagens
assets/images/
├── logo/       → logo.png
├── hero/       → hero-poster.jpg
├── videos/     → hero-video.mp4
├── projetos/   → gallery-*, sobre-*, servico-*, contato-*
├── razoes/     → gifrazoes1-9.png
├── parceiros/  → parceiro1-10.png
└── nav/        → nav-*.jpg
