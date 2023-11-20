<h1 align="center">:file_cabinet: Gerenciador de Filas</h1>

## :memo: Descrição
Este projeto é um sistema de gerenciamento de filas que permite gerar tickets de senhas, chamar senhas e visualizar relatórios do dia atual. Desenvolvido para facilitar a gestão de filas em estabelecimentos como clínicas e hospitais.

## :books: Funcionalidades
* <b>Gerar Tickets de Senhas</b>: Permite aos usuários gerar senhas para diferentes filas.
* <b>Chamar Senhas</b>: Funcionalidade para chamar senhas em ordem.
* <b>Visualizar Relatórios</b>: Relatórios diários podem ser visualizados, mostrando estatísticas importantes.

## :wrench: Tecnologias utilizadas
* XAMPP (PHP 8.2, MySQL);
* Laravel 10;
* Bootstrap para estilização.
* Chart.js para geração de gráficos.

## :rocket: Rodando o projeto
Para rodar o repositório, é necessário clonar o mesmo e iniciar o projeto com os comandos:
```bash
git clone https://github.com/joseradar/gerenciador-de-filas.git
cd gerenciador-de-filas
php artisan serve
```

## :world_map: Rotas do Projeto
* /filas: Esta rota permite ao usuário gerar tickets de senhas para diferentes filas. Cada fila pode ter configurações específicas e prioridades.
* /painel: A rota do painel exibe as senhas que estão sendo chamadas atualmente. É útil para os operadores que gerenciam a ordem das chamadas.
* /chamar: Na rota de chamar, os operadores podem chamar as próximas senhas. Esta funcionalidade garante que as senhas sejam chamadas de maneira ordenada e eficiente.
* /relatorios: A rota de relatórios apresenta um resumo diário das atividades. Inclui informações como o número de tickets gerados e o tempo médio de atendimento.

