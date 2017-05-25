<?php

/*
 * This file is part of Mailchimp.
 *
 * (c) Blue Bay Travel <developers@bluebaytravel.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BlueBayTravel\Mailchimp;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

/**
 * This is the mailchimp service provider class.
 *
 * @author James Brooks <james@bluebaytravel.co.uk>
 */
class MailchimpServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/mailchimp.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('mailchimp.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('mailchimp');
        }

        $this->mergeConfigFrom($source, 'mailchimp');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFactory();
        $this->registerManager();
        $this->registerBindings();
    }

    /**
     * Register the factory class.
     *
     * @return void
     */
    protected function registerFactory()
    {
        $this->app->singleton('mailchimp.factory', function () {
            return new MailchimpFactory();
        });

        $this->app->alias('mailchimp.factory', MailchimpFactory::class);
    }

    /**
     * Register the manager class.
     *
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton('mailchimp', function (Container $app) {
            $config = $app['config'];
            $factory = $app['mailchimp.factory'];

            return new MailchimpManager($config, $factory);
        });

        $this->app->alias('mailchimp', MailchimpManager::class);
    }

    /**
     * Register the bindings.
     *
     * @return void
     */
    protected function registerBindings()
    {
        $this->app->bind('mailchimp.connection', function (Container $app) {
            $manager = $app['mailchimp'];

            return $manager->connection();
        });

        $this->app->alias('mailchimp.connection', Mailchimp::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'mailchimp',
            'mailchimp.factory',
            'mailchimp.connection',
        ];
    }
}
