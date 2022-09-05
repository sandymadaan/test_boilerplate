# terraform variables values, update this file with your own values
heroku_account_email = "rnd@founderandlightning.com"

heroku_api_key = "61ce0697-dc2f-4152-a60f-47f1b7f99a91"

heroku_pipeline_name = "vite-api-pipeline"

heroku_staging_app = "vite-api-staging"

heroku_production_app = "vite-api-production"

heroku_region = "eu"


heroku_staging_database = "heroku-postgresql:hobby-dev"
heroku_staging_newrelic = "newrelic:wayne"
heroku_staging_papertrail= "papertrail:choklad"
heroku_staging_rollbar = "rollbar:trial-5k"
heroku_staging_scheduler = "scheduler:standard"
heroku_staging_redis = "heroku-redis:hobby-dev"

heroku_production_database = "heroku-postgresql:hobby-dev"
heroku_production_newrelic = "newrelic:wayne"
heroku_production_papertrail= "papertrail:choklad"
heroku_production_rollbar = "rollbar:trial-5k"
heroku_production_scheduler = "scheduler:standard"
heroku_production_redis = "heroku-redis:hobby-dev"

heroku_app_buildpacks = [
  "heroku/php",
]
