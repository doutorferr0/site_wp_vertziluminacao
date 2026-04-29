# decisions-and-future-tasks

## Pendentes

### Imagens físicas
- Arquivos em assets/images/ raiz precisam ser movidos para subpastas localmente
- Mover antes de testar: logo/, hero/, videos/, projetos/, razoes/, parceiros/, nav/

### Imagens e copy reais
- Todas as imagens são placeholder
- Cliente não entregou imagens reais ainda
- Copy final não inserido em nenhuma página

### Projetos — popular CPT
- archive-projeto.php pronto mas CPT vazio
- Criar pelo menos 3 projetos de exemplo no wp-admin para validar o layout

### Mobile
- Header/logo no estado is-top em mobile: comportamento não revisado
- Checar breakpoint 767px após imagens reais

### Deploy Hostinger
- Processo de deploy não definido ainda
- Decidir: migração manual vs plugin (WP Migrate, All-in-One WP Migration)

### Páginas internas — CSS
- Algumas classes de page-sobre, page-servicos, page-contato podem ter CSS incompleto
- Validar visualmente cada página após imagens reais

### WP CLI via WSL
- PHP do WSL não tem mysqli — não conecta ao MySQL do LocalWP
- Impacto baixo — editar via GitHub API supre
- Retomar só se precisar rodar comando WP específico

### Miniaturas do nav
- nav-home.jpg, nav-servicos.jpg, nav-sobre.jpg, nav-contato.jpg
- Pill nav atual não usa miniaturas — remover pendência se não quiser retomar
