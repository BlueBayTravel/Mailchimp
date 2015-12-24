<?php

/*
 * This file is part of Mailchimp.
 *
 * (c) Blue Bay Travel <developers@bluebaytravel.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BlueBayTravel\Mailchimp\Facades;

use Illuminate\Support\Facades\Facade;

class Mailchimp extends Facade
{
    /**
     * Create Facade Accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mailchimp';
    }
}
