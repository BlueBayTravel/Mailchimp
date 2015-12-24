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

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

class MailchimpManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \BlueBayTravel\Mailchimp\MailchimpFactory
     */
    protected $factory;

    /**
     * Create a new mailchimp manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository   $config
     * @param \BlueBayTravel\Mailchimp\MailchimpFactory $factory
     *
     * @return void
     */
    public function __construct(Repository $config, MailchimpFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return \BlueBayTravel\Mailchimp\Mailchimp
     */
    protected function createConnection(array $config)
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName()
    {
        return 'mailchimp';
    }

    /**
     * Get the factory instance.
     *
     * @return \BlueBayTravel\Mailchimp\MailchimpFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
