<?php

namespace Ninhtqse\Api\System;

use Illuminate\Translation\TranslationServiceProvider as BaseTranslationServiceProvider;
use Ninhtqse\Api\System\Translation\DistributedFileLoader;
use Ninhtqse\Api\System\Utilties;

class TranslationServiceProvider extends BaseTranslationServiceProvider
{
    /**
     * Register the translation line loader.
     *
     * @return void
     */
    protected function registerLoader()
    {
        $config = $this->app['config']['components'];

        $paths = Utilities::findNamespaceResources(
            $config['namespaces'],
            $config['language_folder_name'],
            $config['resource_namespace']
        );

        $this->app->singleton('translation.loader', function ($app) use ($paths) {
            return new DistributedFileLoader($app['files'], $paths);
        });
    }
}
