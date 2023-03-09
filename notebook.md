# Comandos de Creacion

```bash
DATABASE_URL="postgresql://admin:admin@127.0.0.1:5432/basesymfony?serverVersion=12&charset=utf8"

symfony new my_project_directory --version="6.2.*" --webapp

symfony console doctrine:mapping:import "App/Entity" annotation --path=src/Entity



```