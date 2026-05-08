# next-task

## Foco
Validar conversão WebP local e limpar arquivos originais.

## Objetivo
Garantir que todas as páginas carregam imagens .webp sem 404, depois remover .png/.jpg duplicados.

## Escopo
1. git pull origin main (traz refs PHP atualizadas + ajustes tipografia/legibilidade)
2. Hard reload no localhost:8080 e percorrer todas as páginas (Home, Sobre, Serviços, Iluminação Técnica/Decorativa, Contato, Projetos)
3. DevTools → Network → Img: confirmar 200 em todos .webp
4. Se OK: find . -type f \( -iname "*.png" -o -iname "*.jpg" -o -iname "*.jpeg" \) -delete em assets/images/
5. gup

## Critério de conclusão
- Zero 404 de imagem em todas as páginas
- Apenas .webp em assets/images/ (exceto SVGs)
- Site renderiza idêntico ao estado pré-conversão
