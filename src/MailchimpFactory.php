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

class MailchimpFactory
{
    /**
     * Make a new mailchimp client.
     *
     * @param array $config
     *
     * @return \BlueBayTravel\Mailchimp\Mailchimp
     */
    public function make(array $config)
    {
        return $this->getClient($config);
    }

    /**
     * Get the main client.
     *
     * @param array $config
     *
     * @return \BlueBayTravel\Mailchimp\Mailchimp
     */
    protected function getClient(array $config)
    {
        return new Mailchimp(array_get($config, 'token'));
    }
}
