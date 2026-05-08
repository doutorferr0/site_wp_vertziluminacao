# decisions-future

## Decisões abertas
- Single projeto: layout ainda não definido
- Mobile: header dual-pill pode precisar de versão colapsada
- Equipe: subpágina do Sobre (não item separado no menu)
- AVIF para fotos high-end: avaliar quando suporte browser permitir 100%

## Pendências
- Imagens reais: logo, hero, projetos, parceiros (placeholders ainda em uso)
- Copy final de todas as páginas
- SEO básico (meta descriptions, OG tags)
- Testes de performance (LCP, CLS)
- Apagar PNGs/JPGs originais em assets/images/ após validar WebP no local
- width/height em <img> de galerias para evitar CLS
- Deploy na Hostinger

## Riscos
- Logo hero some ao scrollar (position:absolute) — intencional
- FAB sempre visível pode poluir em mobile — revisar
- init.sql do Docker tem URLs para localhost:8080 — ao fazer deploy precisa rodar Search & Replace nas URLs do banco

## Ambiente
- Docker: restart:unless-stopped — sobe automaticamente com Docker Desktop
- Se containers não subirem: vertz-up
- composer.phar não commitado — regenerar com: docker exec -it vertz_wp bash -c "cd /var/www/html/wp-content/themes/tema-vertz && curl -sS https://getcomposer.org/installer | php && php composer.phar install"
