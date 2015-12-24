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

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class MailchimpServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig($this->app);
    }

    /**
     * Setup the config.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function setupConfig(Application $app)
    {
        $source = realpath(__DIR__.'/../config/mailchimp.php');
        if ($app instanceof LaravelApplication && $app->runningInConsole()) {
            $this->publishes([$source => config_path('mailchimp.php')]);
        } elseif ($app instanceof LumenApplication) {
            $app->configure('mailchimp');
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
        $this->registerFactory($this->app);
        $this->registerManager($this->app);
        $this->registerBindings($this->app);
    }

    /**
     * Register the factory class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function registerFactory(Application $app)
    {
        $app->singleton('mailchimp.factory', function ($app) {
            return new MailchimpFactory();
        });

        $app->alias('mailchimp.factory', MailchimpFactory::class);
    }

    /**
     * Register the manager class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function registerManager(Application $app)
    {
        $app->singleton('mailchimp', function ($app) {
            $config = $app['config'];
            $factory = $app['mailchimp.factory'];

            return new MailchimpManager($config, $factory);
        });

        $app->alias('mailchimp', MailchimpManager::class);
    }

    /**
     * Register the bindings.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function registerBindings(Application $app)
    {
        $app->bind('mailchimp.connection', function ($app) {
            $manager = $app['mailchimp'];

            return $manager->connection();
        });

        $app->alias('mailchimp.connection', Mailchimp::class);
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
