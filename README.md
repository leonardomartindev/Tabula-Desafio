# ToDo List Tabula
![image](https://github.com/user-attachments/assets/179cf936-153d-45de-8bcf-b13309b4e1a0)

![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)
![Figma](https://img.shields.io/badge/figma-%23F24E1E.svg?style=for-the-badge&logo=figma&logoColor=white)
![PhpStorm](https://img.shields.io/badge/phpstorm-143?style=for-the-badge&logo=phpstorm&logoColor=black&color=black&labelColor=darkorchid)
![Visual Studio Code](https://img.shields.io/badge/Visual%20Studio%20Code-0078d7.svg?style=for-the-badge&logo=visual-studio-code&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)


## Descrição do projeto

O ToDo List Tabula é uma aplicação web de gerenciamento de tarefas, que permite aos usuários adicionar, editar, pesquisar, marcar como concluídas e remover tarefas. Além disso, oferece a possibilidade de organizar tarefas em categorias, tornando o processo de gestão mais intuitivo e eficiente. O projeto busca proporcionar uma interface simples e funcional, utilizando tecnologias modernas do desenvolvimento web e banco de dados.

## Tecnologias Utilizadas

- PHP: Linguagem principal do backend, responsável pelo processamento de lógica da aplicação.
- MySQL: Sistema de gerenciamento de banco de dados para armazenamento das tarefas e categorias.
- HTML5/CSS3: Para estrutura e estilo da interface.
- JavaScript: Para funcionalidades interativas como modais e manipulação da interface.
- PDO (PHP Data Objects): Abstração para interações seguras com o banco de dados MySQL.
- Git: Controle de versão do projeto.
- Font Awesome: Utilizado para os ícones no frontend.

## Como Executar o Projeto

### 1. Pré-requisitos:

- PHP 7.4+ instalado na máquina.
- MySQL instalado e configurado.
- Servidor Apache ou Nginx (ou utilize uma ferramenta como XAMPP/WAMP/MAMP para rodar localmente).
- Git para clonar o repositório.

### 2. Clonando Repositório:

  ````bash
  git clone https://github.com/leonardomartindev/Tabula-Desafio.git
  cd ToDoListTabula
  ````

### 3. Configurando o Banco de Dados:
  1. Abra seu cliente MySQL.
  2. Crie um novo banco de dados chamado `tabula`.
  3. Copie o conteúdo do arquivo `schema.sql` que está na pasta `database`.
  4. Cole o conteúdo no cliente `MySQL` e execute os comandos.

### 4. Configurando a conexão com o banco de dados:

  No arquivo `config/database.php`, ajuste as configurações de conexão com o MySQL, conforme necessário:

  ```bash
  $db = new PDO('mysql:host=localhost;dbname=tabula', 'seu_usuario', 'sua_senha');
```

### 5. Executando Aplicação: 

Inicie o servidor `PHP` local navegando até a pasta `public`:

```bash
cd public
```

Inicie o servidor:

```bash
php -S localhost:8000
```

Agora, acesse `http://localhost:8000` no seu navegador.

---

## Funcionalidades Implementadas

- Adicionar Tarefa: Permite ao usuário inserir uma nova tarefa com título e descrição.
- Editar Tarefa: Função para editar uma tarefa existente, alterando título, descrição, estado (concluída ou não) e categoria.
- Remover Tarefa: O usuário pode excluir uma tarefa definitivamente.
- Marcar como Concluída: Função para marcar tarefas como concluídas.
- Pesquisar Tarefas: Permite buscar tarefas pelo título.
- Gerenciamento de Categorias: O usuário pode criar e excluir categorias, além de listar tarefas por categoria.
- Geração de JSON: A aplicação gera um arquivo JSON com todas as tarefas ao ser atualizado o status das tarefas.

### Funcionalidades extras:

- Persistência de dados: Todas as tarefas e categorias são armazenadas no banco de dados.
- Interatividade com JavaScript: Modais de confirmação e navegação com sidebar.
- Feedback visual quando não existem tarefas criadas.

## Linha de Pensamento e Solução de Problemas

### Desafios e Problemas Enfrentados:
Durante o desenvolvimento, enfrentei alguns desafios que impactaram a organização do código e a implementação de funcionalidades:

### 1. Interação com o Banco de Dados (CRUD Completo):

- Problema: Ao criar a lógica CRUD, houve dificuldades iniciais em entender a melhor forma de implementar a persistência dos dados de maneira segura.
- Solução: Optei pelo uso de PDO (PHP Data Objects), que oferece proteção contra injeções de SQL e uma interface mais clara para lidar com o banco de dados.

### 2. Organização das Tarefas por Categorias:

- Problema: A inclusão da lógica de categorias gerou uma complicação adicional, pois exigiu que a arquitetura do código permitisse associar múltiplas tarefas a uma categoria e filtrá-las de forma eficiente.
- Solução: Criei métodos dedicados para lidar com as categorias no CategoriaController e associei a lógica de tarefas por categorias de forma clara, separando responsabilidades entre os controladores.

### 3. Gerenciamento de Conclusão de Tarefas:

- Problema: Inicialmente, a aplicação não tinha uma lógica clara para marcar/desmarcar tarefas como concluídas. Era necessário repensar como isso seria armazenado e visualizado pelo usuário.
- Solução: Adicionei um campo concluida no banco de dados e implementei os métodos marcarTarefaConcluida e desmarcarConcluida, com interação direta via interface.

### 4. Geração de JSON Atualizado:

- Problema: Ao gerar o arquivo JSON após cada operação de alteração de tarefas, enfrentei problemas de sincronização, onde o arquivo nem sempre refletia as mudanças recentes.
- Solução: Centralizei a função de geração de JSON, chamando-a após cada operação de alteração de tarefa (criar, editar, deletar, marcar/desmarcar como concluída), garantindo que o arquivo estivesse sempre atualizado.

### 5. Modais e Sidebar com JavaScript:

- Problema: A implementação da interatividade com modais de confirmação e uma sidebar dinâmica foi um desafio no front-end.
- Solução: Usei JavaScript e CSS para controlar a visibilidade dos modais e da sidebar, mantendo uma interface fluida e responsiva.

![image](https://github.com/user-attachments/assets/547983ae-8b36-4668-8aaf-7d1c76163e83)

---

## Contato

Você pode me encontrar em:
- LinkedIn: [Leonardo Martin de Oliveira](https://www.linkedin.com/in/leonardo-martin-dev/)
