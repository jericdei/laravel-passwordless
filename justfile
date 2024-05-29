start:
    docker compose up -d
stop:
    docker compose down
restart: stop && start
rebuild:
    docker compose up -d --build --force-recreate --remove-orphans
destroy:
    docker compose down -v
logs CONTAINER:
    docker compose logs {{CONTAINER}}
sh:
    docker compose exec php bash
php *COMMAND:
    docker compose exec -u 1000 app php {{COMMAND}}
artisan *COMMAND:
    docker compose exec -u 1000 app php artisan {{COMMAND}}
composer *COMMAND:
    docker compose exec -u 1000 app composer {{COMMAND}}
bun *COMMAND:
    docker compose exec -u 1000 app bun {{COMMAND}}
dev:
    docker compose exec -u 1000 app bun run dev
build:
    docker compose exec -u 1000 app bun run build
open:
    open "http://passwordless.localhost"
