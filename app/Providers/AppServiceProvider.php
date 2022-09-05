<?php

namespace App\Providers;

use Aws\S3\S3Client;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\FilesystemOperator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        FilesystemAdapter::macro('temporaryUploadUrl', function ($path, $expiration, array $options = []) {
            $command = $this->client->getCommand('PutObject', array_merge([
                'Bucket' => $this->config['bucket'],
                'Key' => $this->prefixer->prefixPath($path),
            ], $options));

            $uri = $this->client->createPresignedRequest(
                $command,
                $expiration,
                $options
            )->getUri();

            // If an explicit base URL has been set on the disk configuration then we will use
            // it as the base URL instead of the default path. This allows the developer to
            // have full control over the base path for this filesystem's generated URLs.
            if (isset($this->config['temporary_url'])) {
                $uri = $this->replaceBaseUrl($uri, $this->config['temporary_url']);
            }

            return (string) $uri;
        });
    }
}
