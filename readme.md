# API Edictus Clients
* JQuery
* Axios
* Fetch 
* react-app git repo: https://github.com/ravendano014/react-edictus 

# Scenario
![Edictus API](./Edictus_API.png)

Source: 
https://app.diagrams.net/#G1_1JWbN8oyYL2iyHKq0MIyyJqTWLIjWBo

# BPMN 2.0
Open on https://demo.bpmn.io/
* main process: diagram.bpmn
* external: external.bpmn (pend)
* notify: notify.bpmn (pend)

# Wireframes
* login: https://wireframe.cc
* dashboard: https://wireframe.cc
* main screen: https://wireframe.cc/0Pu3NP

# Docker
- first, make sure docker is running

docker build -t edictuscli

- this build will generates an id for this image 

- to check my images

docker images

- to run as an image of docker (container) as interactive mode
( -p to run in port 4000 otherwise so will use 3000)

docker run -it -p 4000:3000 edictuscli

- to run as a process

docker run -d -p 4000:3000 edictuscli

- to view running docker process

docker ps

- to stop the process
(this command requires the process id, you can use the first three characters of the process to stop it)
process name sample 123jfkdjfkldjfk

docker stop 123

- this will stop the process with the name 123jfkdjfkldjfk

