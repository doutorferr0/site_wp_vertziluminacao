# decisions-and-future-tasks

## Pendentes / decisões abertas

### Carbon Fields
- Instalar via composer no tema (composer require htmlburger/carbon-fields)
- Bootstrap já existe em functions.php (verifica autoload)
- Substituir Customizer WP por Carbon Fields Theme Options
- Prioridade: média

### WP CLI via WSL
- Configurado: PHP.exe do LocalWP (php-8.2.29+0), php-local.ini com mysqli, wp-cli.phar em C:\Users\henri\
- Função wp() no ~/.zshrc pronta
- Problema restante: php.exe Windows não lê path /mnt/c/ do WSL — wp --path precisa de C:\ format
- Impacto baixo — edição via GitHub API e VS Code supre a necessidade
- Retomar só se precisar rodar comando WP específico

### DB_HOST alterado
- wp-config.php: DB_HOST agora é 127.0.0.1:10005 (porta real do LocalWP)
- Não reverter

### Imagens e copy
- Todas as imagens são placeholder — cliente ainda não entregou
- Copy final não inserido em nenhuma página
- Prioridade: alta (próxima fase)

### Deploy Hostinger
- Processo de deploy não definido ainda (pendente confirmar)

### Mobile
- Header/logo no estado is-top em mobile: comportamento não revisado após mudanças recentes
- Checar breakpoint 767px
