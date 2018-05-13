# Moreno

Moreno is a simple documentary manager.

## Getting Started

Follow the instructions below to set up your development environment.

### Install Docker + Docker compose

The development environment has benn containerized using Docker and Docker compose 🐋.
The installation process will depend on your operating sistem. The official docs will guide you:

1. Install Docker: https://docs.docker.com/install/
2. Install Docker compose: https://docs.docker.com/compose/install/

> Note: As the docs If you are using Windows 8 or previous, you should instal Docker toolbox: https://docs.docker.com/toolbox/toolbox_install_windows/.

> Note 2: If you are using Windows, you do not need to install Docker compose separately.

### Build the DEV environment

1. Clone the Moreno repo.
```
git clone https://github.com/avgvsto/moreno.git
```
> This example uses `SSH` but you could choose `HTTPS` as well.

2. Configure app ☕️.

In first place, you should create the Lumen `.env` file. It contains all the environment variables for the project.
```
cd moreno/
cp .env.example .env
```

Edit the `.env` file and override the variables using the proper ones (ask for them to the repo owners).

3. Build the app 🔨.
```
docker-compose build
```

4. Run the app 🚀.
```
docker-compose up
```

Run database migrations
```
cd moreno/
docker exec -it moreno_app_1 bash
php artisan migrate
```

5. Enjoy 🙌🏼.
```
http://localhost:5000/
```
