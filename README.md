# Introdução
Projeto realizado para entender os conceitos básicos do codeigniter 4.

Alguns conceitos abordados no sistema foram:
 - Sistema de (AuthGuard) login, logout e seções
 - Rotas, grupos de rotas e middle
 - Trabalhar com Migrations e Seeders
 - Entender o sistema de templates
 - Upload de arquivos

# Requisitos

PHP versão 7.4 ou maior, com as seguintes extensões instaladas:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

# Setup

No projeto está sendo utilizado o [Azzara](https://github.com/themekita/azzara-admin-dashboard-template) admin dashboard template.

Crie um banco de dados com o nome **ci4** e execute as migrations:

```
php spark migrate
```

Para criar o usuário padrão execute ***Admin***:

```
php spark db:seed UserSeeder
```

Para criar os clientes (empresas) execute:

```
php spark db:seed ClientsFakerSeeder
```

ou se quiser executar os dois seeders anteriores em um único comando use o seeder principal:

```
php spark db:seed MainSeeder
```

retorno esperado:

```
Admin user successfully created!Seeded: App\Database\Seeds\UserSeeder

1000 users successfully created!Seeded: App\Database\Seeds\ClientsFakerSeeder

Seeded: App\Database\Seeds\MainSeeder
```

# Obs

Esse projeto foi criando para fins de estudo e o código contido nele não deve servir de referência. 