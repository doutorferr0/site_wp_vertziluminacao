# current-state

## Fase atual
Pagina /projetos/ com layout focal card funcional. Carbon Fields limpo. FAB vinculado ao header.

## Paginas criadas
- Home (front-page.php)
- Sobre (page-sobre.php)
- Servicos (page-servicos.php)
- Contato (page-contato.php)
- Iluminacao Tecnica (page-iluminacao-tecnica.php)
- Iluminacao Decorativa (page-iluminacao-decorativa.php)
- Archive Projetos (archive-projeto.php)

## Secoes da home (ordem ativa)
1. Hero - fullscreen video/imagem, logo animado grande-pequeno (so home)
2. Parceiros - ticker infinito, 10 logos, fade nas bordas
3. Galeria - tabs Residencial/Comercial/Paisagismo
4. 9 Razoes - swiper horizontal, scrollbar neon vermelha
5. CTA - conversao final

## Header
- Pill nav com sliding background
- Transparente no is-top (home), cinza #0F0F0F 75% ao scrollar
- Aparece ao mover mouse nos 150px do topo
- is-top apenas na home

## Archive Projetos (/projetos/)
- Layout: faixa prev (72px) | card atual | faixa next (72px)
- Card atual: grid 2 col - [titulo centralizado | 3 imagens 5:6]
- Metadados (Funcao, Parceria, Local, Ano) no topo a direita
- Imagens com 16% padding vertical, hover escurece (sem scale)
- Click na imagem -> lightbox com carrossel + miniaturas
- Setas fixas a direita + contador 01/04
- Navegacao teclado: ArrowUp/Down (projeto), ArrowLeft/Right (lightbox)

## Carbon Fields - CPT Projeto
Abas no wp-admin:
- Imagens: Capa/Hero + Galeria (ate 20 fotos)
- Dados: Funcao, Parceria, Local, Ano
- Descricao: rich text (para single do projeto)

## FAB (WhatsApp + Telefone)
- Visivel apenas quando header tem is-visible ou is-top
- Controlado por MutationObserver no vertz.js

## Imagens
- Paths em subpastas (logo/, hero/, projetos/, razoes/, parceiros/, nav/, videos/)
- Arquivos fisicos movidos localmente, nao commitados ainda
