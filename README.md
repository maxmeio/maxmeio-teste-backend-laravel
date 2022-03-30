# Maxmeio - Teste Backend - Laravel

## Orientações gerais sobre o teste

### Clonar esse repositório
### Dê checkout na branch com seu nome
### Faça os commits das funcionalidades implementadas para essa branch

## Descrição
### Criar uma área de gerenciamento, preferencialmente usando adminlte para as views dessa área,
### A área de gerenciamento deverá ter autenticação de usuário, módulo de criação de usuários, módulo de grupos, módulo de notícias
### Deverá ter dois níveis de acesso: Admin e editor de notícias, o admin terá acesso a todos os módulos, o editor de notícias terá acesso apenas ao módulo de notícias

## Sobre o Módulo de criação de usuários
### Operações: criar, editar, deletar
### Dados a serem salvos: nome de usuário, email, senha, associar esse usuário a um grupo

## Sobre o Módulo de criação de grupos
### Operações: criar, editar, deletar
### Dados a serem salvos: Título do grupo, quais módulos aquele grupo poderá acessar

## Sobre o Módulo de criação de notícias
### Operações: criar, editar, deletar
### Dados a serem salvos:  título, data, imagem, conteúdo, status (se ativa ou não)
### OBS1.: Notícia deve ser salva por default como desativada
### OBS2.: Apenas usuários do tipo admin devem poder ativar a notícia

## Caso não consiga implementar todos os itens do teste, envie mesmo assim o que você conseguiu implementar.
## Boa sorte!