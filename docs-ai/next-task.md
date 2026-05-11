# next-task

## Foco
Aplicar escala tipográfica utility (.h1-.h4, .s1-.s3, .b1-.b2) nos templates principais para padronizar hierarquia visual no padrão Kit-style.

## Objetivo
Substituir classes ad-hoc atuais (fz-* fw-* lh-* soltas) por classes semânticas da escala onde fizer sentido. Manter consistência visual entre páginas.

## Escopo
1. front-page.php — títulos de seção, eyebrows, parágrafos hero
2. page-sobre.php — hero, declarações, blocos de texto
3. page-servicos.php — headlines, sublabels
4. page-iluminacao-tecnica.php / page-iluminacao-decorativa.php — títulos
5. page-contato.php — labels do form, headline

Regras:
- não tocar seção "10 Razões" (front-page L240-280)
- preservar classes ff-body / ff-heading existentes onde definem família intencional
- guard CSS já garante Metropolis em .ff-body .title-highlight

## Critério de conclusão
- Páginas auditadas usam .h1-.h4 em títulos H2/H3 principais
- Eyebrows e labels usam .s2 ou .s3
- Parágrafos de destaque usam .b1
- Visual consistente entre templates
