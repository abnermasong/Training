# Docker in the Real World

### Creating a Docker File

- After downloading the resources given by the speaker, open the folder `03-creating-a-dockerfile-part-1` in your IDE.
- Configure the `Dockerfile` with the following codes:
```dockerfile
FROM python:3.13-rc-alpine3.20

RUN mkdir /app
WORKDIR /app

COPY requirements.txt requirements.txt
RUN pip install -r requirements.txt

COPY . . 

LABEL maintainter = "Abner <abner.masong@nabepero.co.jp>" \
      version = "1.0"

CMD flask run --host=0.0.0.0 --port=5000
```
- Note: For `python:3.13-rc-alpine3.20` go to Docker Hub and check the `latest version` of python alpine.

## Docker Commands - Docker Image 
- To build your docker image, go to your terminal and `cd` to the `directory` of the `Dockerfile`
```cmd
cd C:\Users\Nabepero-19028\Abner\diveintodocker\diveintodocker\src\06-docker-in-the-real-world\03-creating-a-dockerfile-part-1
```
- `docker build image -t name .` : To build a docker image.
- `docker image inspect name` : To inspect a docker image.
- `docker image --help` : To list docker image commands.
- `docker image rm name` or `docker image rm imageID` : To remove a docker image.
    - `-f` : Adding `-f` to `rm` bypasses the error that you will encounter when removing docker images with the same `image ID`
- `docker image ls` : Shows the list of built docker images.

#### Pushing/Pulling Docker Image to Docker Hub Account
- `docker login` : This command will ask you to input your Docker `username` and `password`.
- After you have logged in successfully:
- `docker image push ajmasong/name:latest` : This will push your Local Docker Image to your Docker Hub Account.
- `docker image pull ajmasong/name:latest` : This will pull a Docker Image in your Docker Hub Account and Add it in your local machine.
- `docker image tag imagename username/name:latest` : Add a tag to a Docker Image.
    - To remove a tagged username in a Docker Image:
    - `docker image tag username/name name`
    - `docker image rm username/name` 

## Docker Commands - Docker Containers 
- `docker container ls` : To check if there's container running.
- `docker container ls -a` : To check stopped containers.
- `docker container rm 1234` : Change `1234` to `First Four Digits` of the Container ID.
- `docker container run name` : To run a container.
    - `-it` : Enable docker to handle linux signals, terminal colors and realtime inputs.
    - `-p` -> `5000:5000` : For ports.
    - `-e` -> `FLASK_APP=app.py` : Environment variables to be passed on. Can be used multiple times.
    - `-e` -> `FLASH_DEBUG=1` : This enables the debugger. 
    - `-rm` : To automatically remove the container in `ls -a` after stopping it.
    - `--name` -> `web1` : Set the name of the container. Docker will create a random name if this isn't set.
    - `-d` : To run a container in the background. This will enable you to use the current terminal without stopping the container.
    - `--restart on-failure` : The container will automatically restart when failure is detected. This can't be used at the same time with `-rm`.
- `docker container logs name` or `docker container logs first4DigitsOfContainerID` : To debug a container.
    - `-f` : To follow or tail the container you want to debug.
- `docker container stats` : Displays the realtime resources consumption of containers.
- `docker container stop name` : To stop a running container.

### Live Code Reloading with Volumes
- `docker container run -it --rm --name web1 -p 5000:5000 -e FLASK_APP=app.py web1 -e FLASK_DEBUG=1 -v C/Users/Nabepero-19028/Abner/diveintodocker/diveintodocker/src/06-docker-in-the-real-world/03-creating-a-dockerfile-part-1 web1` : This does not work on my end. The debugging techniques didn't also work.

## Cleaning Up
- `docker container ls` : List all containers.
- `docker container ls -a` : List all stopped containers.
- `docker system df` - Show disk space is being used by docker, append `-v` is verbose
- `docker image ls` - Shows all docker images, any image that has the `<none>` tag are dangling/unused images
- `docker system info` - Display information about docker installation
- `docker system prune` - Prunes all safe to delete images and containers, append `-f` to delete without needing to confirm it, `-a` is to delete all unused images.
- `docker stop name1 name2 name3` - Stop the containers in `name1`, `name2`, and `name3`.
- `docker stop $(docker container ls -a -q)` - Stops multiple containers especially on running more than 10 or more docker containers
