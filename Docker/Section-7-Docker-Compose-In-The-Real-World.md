# Docker Compose In The Real World

- `docker-compose.yml` configuration
```yml
version: '3'

services:
  redis:
    image: 'redis:3.2-alpine'
    ports:
      - '6379:6379'
    volumes:
      - 'redis:/data'

  web:
    build: .
    depends_on:
      - 'redis'
    env_file:
      - '.env'
    ports:
      - '5000:5000'
    volumes:
      - '.:/app'

volumes:
  redis: {}
```

### Docker Compose Commands
- `docker compose --help` : Shows docker compose command list.
- `docker compose build` : Build image.
- `docker compose pull` : Pull images from Docker Hub.
- `docker compose up` : Run the containers.
- `docker compose stop` : Stop the containers.
- `docker compose up --build -d` : Build and start the container at the background.
- `docker compose logs -f` : Tail/Follow the output.
- `docker compose restart` : Restart the container.
- `docker compose exec naame` : Execute a command in name.
- `docker compose rm` : Remove stopped containers. 
