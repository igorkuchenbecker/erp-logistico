# ERP Logístico

Sistema de controle de entregas e Unidades de Frete (UFs) para a Vix Logística,
desenvolvido em **Laravel 13** + **Tailwind CSS** (via CDN).

## Funcionalidades

- **CRUD de UFs**: cadastro com código, peso, tipo de item, origem (ARM-MACAÉ, IMBETIBA, IMBOASSICA, ARM-RIO) e destino (PACU, BMAC)
- **8 status**: pendente, aguardando coleta, coletado, unitizado, liberado programação, em trânsito, entregue e cancelado
- **Rastreamento**: código de 4 dígitos gerado automaticamente ao marcar "Em Trânsito", com prazo de entrega de 2 dias
- **Página de destino**: informações de BMAC (Porto de Imbetiba) e PACU (Porto do Açu) com listagem de UFs
- **Dashboard**: cards de status, top destinos, entregas recentes e em trânsito
- **Dark mode**: alternância ☾/☀ persistente

## Rodar sem instalar nada — GitHub Codespaces (recomendado)

Você pode rodar o sistema inteiro no navegador, sem instalar nada na sua máquina:

1. Acesse https://github.com/igorkuchenbecker/erp-logistico
2. Clique no botão verde **"<> Code"** → aba **Codespaces** → **Create codespace on main**
3. Aguarde o ambiente ser preparado (instala PHP, Composer, roda migrations e o seed automaticamente)
4. Quando o terminal mostrar o projeto pronto, execute:

   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

5. O Codespaces abre automaticamente o navegador na porta 8000 com o sistema rodando.
6. Para abrir em outra máquina da rede, clique no ícone de porta (aba **Ports**) → botão direito na porta 8000 → **Forward a Port** → **Port Visibility: Public** e compartilhe o link.

O banco de dados usa **SQLite** (nenhum servidor MySQL necessário) e já vem populado com **14 UFs de exemplo** (vários status e códigos de rastreio).

### Dados de exemplo
- Usuário de teste: `test@example.com`
- UFs com rastreio: acesse a aba **Rastreamento** para ver os códigos gerados.

## Rodar localmente

Requisitos: PHP 8.3+, Composer, MySQL ou SQLite.

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

Acesse http://localhost:8000

## Estrutura

```
erp-logistico/
├── app/
│   ├── Http/Controllers/   # Dashboard, UF, Rastreamento, Destino
│   └── Models/UF.php       # model com geração de código e rastreio
├── database/
│   ├── migrations/         # users, cache, jobs, ufs, rastreamento
│   └── seeders/            # UFSeeder (14 UFs de exemplo)
├── resources/views/        # blade com Tailwind + dark mode
├── routes/web.php          # rotas
└── .devcontainer/          # configuração do GitHub Codespaces
```
