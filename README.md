# Person Collector#
Recruitment task.
This is not production ready code. The goal is to not use any framework or library.
**This is mostly experimental project** due to mixing old and new ideas. 
## Why? ##
This repo is create for some for basic old requirement task from internet related with PHP. This examples may not contain actual trends and ideas.

## Getting started ##
The following examples assume you have a working Docker environment, with docker-compose installed. Please check the Docker documentation for instructions.

1. Clone the PersonCollector repo: ``` git clone https://github.com/DarekRepos/PersonCollector.git person-collector
cd person-collector ```
2. Build the instances  ```docker-compose build```
3. Start up  ```docker-compose up```

 
 ## How work ##
 
Local webserver is accessible on port 80  and are set up to

```
localhost
```

User and password for the phpmyadmin is locasted in docker-compose.yml file


phpmyadmin are set up to

```localhost:8183```

## Requirements ##
Local environment are set up on Linux distribution (Ubuntu).
User must install:
* Docker
* Docker Compose tool
* Composer 

### Docker ###
Docker-compose is used to create local  server environment:
* php:7.2.1-apache-with some very basic extensions
* mysql:5.7
* phpmyadmin


### Composer ###
which is used to install PHP packages and autoloading.