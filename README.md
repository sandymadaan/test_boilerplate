## TL;DR
- Click on the button "Use this template" to get started
- Select username/organisation and type the repo name, and hit enter
```
git clone git@github.com:your-username/saw-api.git
```
```
cd saw-api
```

Find-and-replace `laravel-api` with `saw-api`, `laravel-pg` with `saw-pg`, and update IP address (wherever applicable) in following files:
- `docker-compose.yml`
- `composer.json`
- `.env.example`
- `.env.testing`
- `.circleci/config.yml`

```
docker-compose up --build -d
```
```
docker-compose exec saw-api composer install
```
```
docker-compose exec saw-api composer run dev-setup
```
```
git config core.filemode false
```
```
http://220.223.1.1
```
