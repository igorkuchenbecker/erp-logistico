# ERP Logístico

Mini ERP de controle de Unidades de Frete (UF): cadastro, status operacionais,
rastreamento e destinos — espelhando o fluxo real de uma transportadora.

Laravel 13 · Tailwind · SQLite (dev) / MySQL

## Finalidade

Exercitar o ciclo completo de uma aplicação web de transporte na prática: cadastrar
UFs com seus dados, acompanhar o status operacional de cada uma, gerar rastreamento
com prazo e consultar os destinos vinculados — tudo numa interface simples com
dashboard de resumo.

## Como funciona

- **CRUD de UFs**: código, peso, tipo de item, origem (ARM-MACAÉ, IMBETIBA, IMBOASSICA,
  ARM-RIO) e destino (PACU, BMAC)
- **8 status operacionais**: pendente, aguardando coleta, coletado, unitizado, liberado
  programação, em trânsito, entregue, cancelado — com badge colorido por status
- **Rastreamento**: código de 4 dígitos gerado automaticamente ao entrar "Em Trânsito"
  e prazo de entrega de 2 dias; destaque vermelho para prazos vencidos
- **Página por destino** (Porto do Açu, Porto de Imbetiba) com as UFs vinculadas
- **Dashboard** com cards de status, top destinos e entregas recentes/em trânsito
- **Dark mode** persistente (toggle ☾/☀ na navbar, salvo no localStorage)

## Como rodar

**Codespaces** — abra o repositório → `<> Code` → Codespaces → create on `main`.
O devcontainer instala PHP/Composer, roda `migrate --seed` e popula 14 UFs de exemplo
com códigos de rastreio. Depois:

```sh
php artisan serve --host=0.0.0.0 --port=8000
```

**Local** — requer PHP 8.3+ e Composer:

```sh
composer install
cp .env.example .env && php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```