# Vertz Iluminação - WordPress Theme

## Descrição

Site WordPress customizado para Vertz Iluminação com design inspirado em Base Habitation.

- **Local**: http://vertziluminaocombr.local
- **Theme**: tema-vertz
- **Stack**: WordPress 6.x + PHP 8.2 + MySQL 8.0 + nginx

## 📋 Conteúdo

### Tema WordPress (`/app/public/wp-content/themes/tema-vertz/`)

```
tema-vertz/
├── CONTEXT.md           # Documentação para desenvolvedores
├── style.css            # Identificação do tema
├── functions.php        # Enqueue de scripts e styles
├── index.php            # Template fallback
├── header.php           # Header + navegação
├── footer.php           # Footer
├── front-page.php       # Homepage (9 seções + cards slider)
├── assets/
│   ├── css/
│   │   └── vertz.css    # CSS completo (1.400+ linhas)
│   └── js/
│       └── vertz.js     # JavaScript (400+ linhas)
└── dist/                # Referências (NÃO USAR)
```

## ✨ Features

### Estrutura
- ✅ 10 seções responsivas (Hero, Gallery, Products, Cards Slider, FAQ, Contact, etc)
- ✅ Header sticky com navegação mobile
- ✅ Grid 24-coluna responsivo
- ✅ HTML semântico com ARIA roles

### CSS
- ✅ 1.400+ linhas de CSS próprio
- ✅ Variáveis CSS (cores, tipografia, espaçamentos)
- ✅ Google Fonts (Playfair Display + Inter)
- ✅ Mobile-first approach
- ✅ Breakpoints: 768px (tablet), 1280px (desktop)

### JavaScript
- ✅ Header sticky
- ✅ Burger menu mobile
- ✅ FAQ accordion
- ✅ Scroll animations (IntersectionObserver)
- ✅ Gallery slider (Swiper.js)
- ✅ Cards slider (15 items, 4 por linha desktop)
- ✅ Partners ticker (infinite loop)
- ✅ Sem jQuery ou dependências pesadas

### Performance
- ✅ Swiper v11 via CDN (MIT license)
- ✅ Lazy loading
- ✅ Aspect-ratio images
- ✅ Deferred JavaScript loading

## 📱 Responsividade

| Device | Width | Status |
|--------|-------|--------|
| Mobile | <768px | ✅ Testado |
| Tablet | 768px+ | ✅ Testado |
| Desktop | 1280px+ | ✅ Testado |

## 🚀 Seções Homepage

1. **Hero** - Vídeo fullscreen + título
2. **Page Heading** - Chamada principal
3. **Gallery Slider** - Swiper com imagens
4. **Produtos** - Grid (Residencial + Comercial)
5. **Cards Slider** - 15 categorias de projetos (PHP dinâmico)
6. **Page Heading** - Diferenciais
7. **Features** - Imagem + lista benefícios
8. **Parceiros** - Ticker infinito
9. **FAQ** - Accordion
10. **Contato** - CTA final

## 📊 Status

**Completude: ~80%**

### ✅ Concluído
- Arquitetura e código
- CSS e JavaScript
- 10 seções estruturadas
- Responsividade testada
- Acessibilidade básica
- Performance otimizada

### ⏳ Pendente (Cliente)
- Logo Vertz
- Paleta de cores
- Textos reais
- Imagens (15+)
- Email de contato
- Redes sociais

### ❌ Não iniciado
- Conteúdo seções About/Services
- Integração formulário contato
- Custom Post Types
- SEO/Sitemap
- Deploy produção

## 📝 Documentação

- `RESUMO-STATUS.txt` - Status completo do projeto
- `CONTEXT.md` - Guia para desenvolvedores
- `feito-15.txt` - Diagnóstico Swiper CDN
- `feito-16.txt` - Primeira versão cards slider
- `feito-17.txt` - Redesign com 15 cards
- `feito-18.txt` - Otimização final

## 🔧 Como Usar

### Desenvolvimento Local

1. Clone o repositório
2. Configure LocalWP com o site `vertziluminaocombr.local`
3. Copie a pasta `/app` para LocalWP
4. Ative o tema "tema-vertz" no WordPress Admin

### Atualizar Conteúdo

**Editar cores:**
```css
/* vertz.css, linha ~20 */
--color-primary: #ff3b36;      /* Altere para cor cliente */
--color-secondary: #efeece;    /* Altere para cor cliente */
```

**Adicionar cards slider:**
```php
/* front-page.php, linhas 197-211 */
$cards_data = [
  ['title' => 'Novo Card', 'subtitle' => 'Subtítulo', 'desc' => 'Descrição'],
  // Adicione mais aqui
];
```

**Preencher FAQ:**
Edite a seção FAQ em `front-page.php` com Q&A reais.

## 📦 Dependências

- **WordPress** 6.x
- **PHP** 8.2+
- **MySQL** 8.0+
- **Swiper v11** (CDN jsDelivr - MIT license)
- **Google Fonts** (Playfair Display + Inter)

Nenhuma dependência Node.js ou build tool necessária.

## 🎨 Design Reference

Baseado em: https://basehabitation.com/en/

- Tipografia: Playfair Display + Inter
- Paleta: Vertz (a definir)
- Grid: 24 colunas
- Container padding: 20px (mobile) → 40px (desktop)

## 📈 Estatísticas

- **Linhas CSS**: 1.400+
- **Linhas JS**: 400+
- **Linhas HTML**: 500+
- **Seções**: 10
- **Componentes**: 20+
- **Breakpoints**: 3 (mobile, tablet, desktop)

## 👤 Desenvolvimento

Desenvolvido para **Vertz Iluminação** por Claude (GitHub Copilot).

## 📄 Licença

Repositório privado. Todos os direitos reservados à Vertz Iluminação.

---

**Status**: Production Ready (conteúdo pendente)  
**Última atualização**: 2026-04-01  
**Versão**: 1.0

## 🔗 Links Úteis

- Local: http://vertziluminaocombr.local
- GitHub: https://github.com/doutorferr0/site_wp_vertziluminacao
- Referência: https://basehabitation.com/en/

---

Para mais informações, consulte `CONTEXT.md` ou `RESUMO-STATUS.txt`.
