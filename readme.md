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
git clone git@github.com:avgvsto/moreno.git
```
> This example uses `SSH` but you could choose `HTTPS` as well.

2. Build the app 🔨.
```
cd moreno/
docker-compose build
```

3. Run the app 🚀.
```
docker-compose up
```

4. Configure app ☕️.

Set the environment variables of your project.
```
cd moreno/
cp .env.example .env
nano .env
```

Run database migrations
```
cd moreno/
docker exec -it moreno_db_1 bash
php artisan migrate
```

5. Enjoy 🙌🏼.
```
http://localhost:5000/
```
