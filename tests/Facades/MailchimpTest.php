<?php

/*
 * This file is part of Mailchimp.
 *
 * (c) Blue Bay Travel <developers@bluebaytravel.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BlueBayTravel\Tests\Mailchimp;

use BlueBayTravel\Mailchimp\Facades\Mailchimp;
use BlueBayTravel\Mailchimp\MailchimpManager;
use GrahamCampbell\TestBenchCore\FacadeTrait;

class MailchimpTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'mailchimp';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return Mailchimp::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return MailchimpManager::class;
    }
}
