## EasyGym API 🏋🏼‍♂️

A EasyGym API é uma API REST desenvolvida para gerenciamento completo de academias, permitindo o controle de usuários, treinos, exercícios, equipamentos e sessões de treino, além do acompanhamento do desempenho físico dos alunos e geração de dietas/treinos via IA. **(em desenvolvimento)**.

O projeto foi desenvolvido com foco em organização de domínio, boas práticas e escalabilidade, servindo tanto como base para aplicações reais quanto como projeto de estudo avançado.

## Features Atuais 📓

- Autenticação via Laravel Sanctum **(Bearer Token)** 🔐
- CRUD para as entidades relativas ao controle de treinos, usuários, equipamentos e afins. 
- Gerenciamento dos treinos e exercícios. 🏋🏼‍♂️
- Associação de exercícios as fichas de treino dos usuários. 📝
- Controle de sessões de treino. 📲
- Monitoramento de RPE *(Taxa de Percepção Subjetiva de Esforço)* e nível de dor durante os exercícios. 🥵
- Rotas validadas por politicas de acesso de acordo com o tipo de usuário (Aluno, Instrutor ou Administrador). 🛡️

## Pré-Requisitos 🎯

- Docker Desktop.
- WSL ou ambiente baseado em Linux.
- Github

## Tecnologias usadas ⚙️

- PHP 8.3
- Laravel
- Laravel Sail (Docker)
- PostgreSQL
- Laravel Sanctum
- Visual Studio Code
- Postman
- Arquitetura baseada em Services e Repositories

## Passo a passo 🧑🏻‍💻

- O projeto pode ser clonado dentro de uma WSL, ou em um ambiente Linux. Instalar as dependencias do PHP, o Composer e rodar os comandos para gerar os arquivos **vendor** do Laravel.

- Dentro da WSL:
    - *Instalar o PHP e Composer*
        - sudo apt update && sudo apt upgrade -y
        - sudo apt install -y php8.3
        - sudo apt install -y composer
        - Para clonar o projeto: git clone https://github.com/KelvinPilger/EasyGym.git
    - *Instalar e inicializar o projeto (Laravel)*
        - composer require laravel/sail --dev
        - php artisan sail:install (Escolher apenas o PostgreSQL)
        - Ajustar o .env para os dados do banco de dados.
        - Inicializar o contâiner Docker acoplado do Laravel com o comando: **./vendor/bin/sail up**
        - Ao inicializar, rodar o comando: **sail artisan migrate**, para rodar as migrations.
        - Após rodar as migrations, rodar o comando: **sail artisan db:seed**, para realizar o seeding dos registros.

- *_Link da Collection do Postman para testar as rotas:_* https://drive.google.com/file/d/1jqLB7x8X2CZ3X-v7j4ePHlNTxQFB_Dpf/view?usp=sharing
