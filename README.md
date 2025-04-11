# Project Setup Guide

## Prerequisites
- Docker and Docker Compose installed on your system
- Git (optional)

## Installation Steps

1. Clone or download the project to your local machine

2. Navigate to the project directory
```bash
cd nhatansteel
```

3. Start the Docker containers
```bash
docker compose up -d
```
This will start:
- WordPress on port 8080
- phpMyAdmin on port 8081 
- MySQL database

4. Using Phpmyadmin Import the database (http://localhost:8081/)

## Accessing the Applications

- WordPress: http://localhost:8080
- phpMyAdmin: http://localhost:8081
  - Username: exampleuser
  - Password: examplepass

## Stopping the Project
```bash
docker compose down
```

## Additional Notes
- Database credentials are defined in the docker-compose.yml file
- WordPress files are stored in the `src` directory
- MySQL data is persisted in the `data` directory