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
use GrahamCampbell\TestBench\AbstractTestCase as AbstractTestBenchTestCase;
use Illuminate\Contracts\Config\Repository;
use Mockery;

class MailchimpManagerTest extends AbstractTestBenchTestCase
{
    public function testCreateConnection()
    {
        $config = ['token' => 'your-token'];

        $manager = $this->getManager($config);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('mailchimp.default')->andReturn('mailchimp');

        $this->assertSame([], $manager->getConnections());

        $return = $manager->connection();

        $this->assertInstanceOf(Mailchimp::class, $return);

        $this->assertArrayHasKey('mailchimp', $manager->getConnections());
    }

    protected function getManager(array $config)
    {
        $repo = Mockery::mock(Repository::class);
        $factory = Mockery::mock(MailchimpFactory::class);

        $manager = new MailchimpManager($repo, $factory);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('mailchimp.connections')->andReturn(['mailchimp' => $config]);

        $config['name'] = 'mailchimp';

        $manager->getFactory()->shouldReceive('make')->once()
            ->with($config)->andReturn(Mockery::mock(Mailchimp::class));

        return $manager;
    }
}
