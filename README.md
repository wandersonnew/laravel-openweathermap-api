## Sobre o projeto

Este projeto faz consumo da API openweathermap juntamente com Laravel 9 e MySQL. O software segue o seguinte fluxo:

- Faz consulta no banco de dados MySQL nos registros inseridos da hora atual até 20 minutos atrás.
- Se houver algum registro que aetnda a condição anterior os dados são retornados para a tela de requisição.
- Se não houver registros no banco de dados, fará o consumo da API openweathermap e retornará os dados da requisição.

A requisição é feita via GET usando ajax, assim os dados são exibidos na mesma tela de consulta.

## Requisitos para usar o software:

- **Ter PHP na sua máquina (versão 7 acima)**
- **[Precisa ter banco de dados MySQL na sua máquina**
- **[Criar um banco de dados**
- **[Registrar as informações do banco no arquivo .env da aplicação Laravel (nome do banco, usuário e login de acesso)**
- **[Gerar a migration referente a API (não foi excluídas as migrations padrões)**
- **[Possuir conexão com a internet (Para usar Bootstrap CDN e consumo da API)**

## Exemplos do software em uso:
