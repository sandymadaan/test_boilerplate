# Heroku apps
provider "heroku" {
  email   = var.heroku_account_email
  api_key = var.heroku_api_key
}

resource "heroku_app" "staging" {
  name   = var.heroku_staging_app
  region = var.heroku_region

  #set config variables
  config_vars = {
    APP_ENV = "staging"
    APP_NAME = "Staging"
    DB_CONNECTION = "pgsql"
    APP_DEBUG = "false"
    APP_KEY = "enter-app-key-here"
  }

  buildpacks = var.heroku_app_buildpacks
}

resource "heroku_app" "production" {
  name   = var.heroku_production_app
  region = var.heroku_region

  #set config variables
  config_vars = {
    APP_ENV = "production"
    APP_NAME = "Production"
    DB_CONNECTION = "pgsql"
    APP_DEBUG = "false"
    APP_KEY = "enter-app-key-here"
  }

  buildpacks = var.heroku_app_buildpacks
}
