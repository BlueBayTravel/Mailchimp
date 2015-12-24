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

use BlueBayTravel\Mailchimp\Mailchimp;
use BlueBayTravel\Mailchimp\MailchimpFactory;
use BlueBayTravel\Mailchimp\MailchimpManager;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;

class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testMailchimpFactoryIsInjectable()
    {
        $this->assertIsInjectable(MailchimpFactory::class);
    }

    public function testMailchimpManagerIsInjectable()
    {
        $this->assertIsInjectable(MailchimpManager::class);
    }

    public function testBindings()
    {
        $this->assertIsInjectable(Mailchimp::class);

        $original = $this->app['mailchimp.connection'];
        $this->app['mailchimp']->reconnect();
        $new = $this->app['mailchimp.connection'];

        $this->assertNotSame($original, $new);
        // $this->assertEquals($original, $new);
    }
}
