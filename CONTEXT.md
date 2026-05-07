# Projeto: Vertz Iluminação — WordPress Theme
## Para Claude Code: leia este arquivo inteiro antes de qualquer tarefa.

---

## Ambiente
- LocalWP: http://vertziluminaocombr.local
- Tema: /wp-content/themes/tema-vertz/
- Stack: nginx + PHP 8.2 + MySQL 8.0
- Editor: VS Code via WSL (Ubuntu)
- Windows path: C:\Users\henri\Local Sites\vertziluminacaocombr\app\public\
- WSL path: /mnt/c/Users/henri/Local Sites/vertziluminacaocombr/app/public/

---

## Objetivo
Criar um site WordPress para a empresa Vertz Iluminação com design inspirado no
site Base Habitation (basehabitation.com/en/), mas com código 100% próprio —
sem reutilizar CSS/JS minificados de terceiros, sem dependências de copyright externo.

---

## Status atual
- [x] Tema WordPress ativado (tema-vertz)
- [x] Páginas criadas: Home, Sobre, Serviços, Contato
- [x] Home definida como página estática
- [x] Menu Principal criado e atribuído
- [x] front-page.php com 9 seções estruturadas (placeholders de imagem e texto)
- [x] header.php e footer.php funcionais
- [x] CSS de referência em dist/css/main.css (NÃO USAR — será substituído)
- [x] JS de referência em dist/js/bundle.js (NÃO USAR — será substituído)

---

## PRÓXIMA ETAPA PRIORITÁRIA
Reescrever CSS e JS do zero, sem copyright de terceiros.

### CSS (assets/css/vertz.css)
Criar sistema utilitário próprio baseado no design do Base Habitation:
- Grid de 24 colunas responsivo
- Variáveis CSS com cores, tipografia, espaçamentos da Vertz
- Componentes: header, hero, galeria, features, faq, footer
- Fontes: Playfair Display (headings) + Inter (body) via Google Fonts
- Animações: scroll-based com IntersectionObserver (sem Locomotive Scroll)
- SEM dependências externas de CSS

### JS (assets/js/vertz.js)
Criar JS modular próprio:
- Header: sticky + burger menu mobile
- Hero: vídeo background lazy
- Galeria slider: Swiper.js (CDN, licença MIT — permitido)
- Scroll animations: IntersectionObserver nativo
- FAQ: accordion simples
- Parceiros ticker: CSS animation (sem JS)
- SEM windmill, SEM locomotive-scroll, SEM código do MILL3 Studio

---

## Estrutura de arquivos do tema
```
tema-vertz/
├── CONTEXT.md              ← este arquivo
├── style.css               ← identificação WP
├── functions.php           ← enqueue, menus, suporte
├── index.php               ← fallback
├── header.php              ← header + nav
├── footer.php              ← footer
├── front-page.php          ← homepage com 9 seções
├── assets/
│   ├── css/
│   │   └── vertz.css       ← CSS próprio (A CRIAR)
│   └── js/
│       └── vertz.js        ← JS próprio (A CRIAR)
└── dist/                   ← IGNORAR (referência antiga, não usar)
```

---

## Seções da Home (front-page.php)
1. Hero — vídeo fullscreen + título grande
2. Page Heading — subtítulo + título centralizado + parágrafo
3. Galeria Mídias — slider Swiper com tags filtrantes
4. Produtos — grid 2 colunas com cards
5. Page Heading — diferenciais
6. Features — imagem grande esquerda + lista direita
7. Parceiros — ticker horizontal com logos
8. FAQ — accordion
9. Contato — imagem esquerda + texto + formulário direita

---

## Design reference (inspecionar via DevTools)
- Site: https://basehabitation.com/en/
- Cores originais: primária #ff3b36 (vermelho), secundária #efeece (bege)
- Cores Vertz: A DEFINIR pelo cliente
- Tipografia: Playfair Display (serif, headings) + Inter (sans, body)
- Grid: 24 colunas com gap de 12px (md) e 20px (xl)
- Container: margin lateral de 20px (mobile) e 40px (desktop)

---

## Pendente do cliente
- [ ] Logo da Vertz (SVG ou PNG fundo transparente)
- [ ] Paleta de cores definitiva (hex)
- [ ] Fotos dos projetos/produtos
- [ ] Vídeo para o hero
- [ ] Textos reais (atualmente Lorem Ipsum)
- [ ] Email de contato real
- [ ] Redes sociais

ultima conversa:
tentei utilizar o claude code, mas ele nao foi direito creio eu

Leia o arquivo wp-content/themes/tema-vertz/CONTEXT.md e use como contexto completo antes de qualquer tarefa. Após ler, confirme o que entendeu e Baseado no CONTEXT.md, crie o arquivo assets/css/vertz.css com o sistema de grid e variáveis. , tambem baseado no CONTEXT.md, crie o arquivo assets/js/vertz.js com o header sticky e accordion FAQ.

Executou 4 comandos, leu 2 arquivos, arquivos encontrados

Executou 4 comandos, leu 2 arquivos, arquivos encontrados

Contexto lido. Vou criar os dois arquivos simultaneamente.

Executou 7 comandos, arquivos encontrados

Executou 7 comandos, arquivos encontrados

Agora crio os dois arquivos em paralelo.

Enviado para Pré-visualização

Detect my project's dev servers and save all their configurations to .claude/launch.json, then ask which ones to start.



```json

{

  "version": "0.0.1",

  "configurations": [

    {

      "name": "<server-name>",

      "runtimeExecutable": "<command>",

      "runtimeArgs": ["<args>"],

      "port": <port>

    }

  ]

}



```



Use runtimeExecutable for the command (e.g. "yarn", "npm", "node", "python") and runtimeArgs for its arguments. Call preview_start for each server the user wants to run.

Enviado para Pré-visualização

Detect my project's dev servers and save all their configurations to .claude/launch.json, then ask which ones to start.



```json

{

  "version": "0.0.1",

  "configurations": [

    {

      "name": "<server-name>",

      "runtimeExecutable": "<command>",

      "runtimeArgs": ["<args>"],

      "port": <port>

    }

  ]

}



```



Use runtimeExecutable for the command (e.g. "yarn", "npm", "node", "python") and runtimeArgs for its arguments. Call preview_start for each server the user wants to run.

As pastas assets/css e assets/js já foram criadas (retornou OK). Agora salvei o functions.php no VS Code com o conteúdo novo.

Leia o arquivo wp-content/themes/tema-vertz/CONTEXT.md e gere os arquivos vertz.css e vertz.js completos.

Leu 3 arquivos

Leu 3 arquivos

Tenho todos os arquivos necessários. Criando os dois arquivos agora em paralelo.

Criou 2 arquivos

Criou 2 arquivos

You've hit your limit · resets 4pm (America/Sao_Paulo)

voce conseguiu?

✅ Sim! Ambos os arquivos foram criados com sucesso:

1. `assets/css/vertz.css` — Sistema CSS completo com:

   * Grid 24 colunas responsivo

   * Variáveis CSS (cores, tipografia, espaçamentos, z-index)

   * Google Fonts (Playfair Display + Inter)

   * Componentes: header, hero, galeria, features, FAQ, footer

   * Animações via IntersectionObserver

   * Utilitários e reset

2. `assets/js/vertz.js` — JS modular próprio com:

   * Header sticky (adiciona `.is-scrolled` ao rolar)

   * Burger menu mobile (abre/fecha)

   * FAQ accordion (um item aberto por vez)

   * Scroll animations (IntersectionObserver nativo)

   * Site loader (esconde overlay após load)

   * Hero video lazy load

   * Parceiros ticker (duplicate para loop)

   * Integração com Swiper (via CDN, MIT)

Ambos estão prontos para serem enqueue no `functions.php`. Você já atualizou o functions.php para chamar esses arquivos?

voce esta fazendo? entre em conversa com meu outro chat tambem e nao esqueça de consultar o context.md

You've hit your limit · resets 4pm (America/Sao_Paulo)



e a estrutura da arvore de arquivos no momento é a estrutura.txt
EOF