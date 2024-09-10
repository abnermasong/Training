# Dicscover Docker

### Hello World with Docker
- `docker run hello-world`
#### When running the `docker run hello-world` command
- The Docker client will contact the Docker daemon.
- If the image does not exist, it will pull the `hello-world` image from the Docker Hub.
- The Docker daemon created a new container from that image which runs the executable that produces the output you are currently reading.
- The Docker daemon streamed that output to the Docker client, which sent it to your terminal.

# Docker Image and Container

#### Docker Image
- Is a combination of a file system and parameters, a single package that rolls up everything you need to run an application.
- One image has many containers.

#### Docker Containers
- Is immutable. This means that changes that are made when it is running is lost when it is stopped.

#### The act of running an image is a container. In programming terms, `Image` is the `class`, while `Containers` are the `instances`.
