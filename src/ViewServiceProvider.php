<?php

namespace Ninhtqse\Api\System;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\View\ViewServiceProvider as BaseViewServiceProvider;
use Ninhtqse\Api\System\Utilities;

class ViewServiceProvider extends BaseViewServiceProvider
{
    public function register()
    {
        $config = $this->app['config']['components'];

        $paths = Utilities::findNamespaceResources(
            $config['namespaces'],
            $config['view_folder_name'],
            $config['resource_namespace']
        );

        $this->app['config']['view.paths'] = array_merge($this->app['config']['view.paths'], $paths);

        parent::register();
    }
}
