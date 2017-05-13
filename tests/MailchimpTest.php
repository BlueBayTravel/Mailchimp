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
use Mailchimp_Campaigns;
use Mailchimp_Conversations;
use Mailchimp_Ecomm;
use Mailchimp_Folders;
use Mailchimp_Gallery;
use Mailchimp_Goal;
use Mailchimp_Helper;
use Mailchimp_Lists;
use Mailchimp_Mobile;
use Mailchimp_Neapolitan;
use Mailchimp_Reports;
use Mailchimp_Templates;
use Mailchimp_Users;
use Mailchimp_Vip;

/**
 * This is the mailchimp test class.
 *
 * @author James Brooks <james@bluebaytravel.co.uk>
 */
class MailchimpTest extends AbstractTestCase
{
    public function testCampaigns()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Campaigns::class, $mailchimp->campaigns());
    }

    public function testConversations()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Conversations::class, $mailchimp->conversations());
    }

    public function testEcomm()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Ecomm::class, $mailchimp->ecomm());
    }

    public function testFolders()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Folders::class, $mailchimp->folders());
    }

    public function testGallery()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Gallery::class, $mailchimp->gallery());
    }

    public function testGoal()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Goal::class, $mailchimp->goal());
    }

    public function testHelper()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Helper::class, $mailchimp->helper());
    }

    public function testLists()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Lists::class, $mailchimp->lists());
    }

    public function testMobile()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Mobile::class, $mailchimp->mobile());
    }

    public function testNeapolitan()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Neapolitan::class, $mailchimp->neapolitan());
    }

    public function testReports()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Reports::class, $mailchimp->reports());
    }

    public function testTemplates()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Templates::class, $mailchimp->templates());
    }

    public function testUsers()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Users::class, $mailchimp->users());
    }

    public function testVip()
    {
        $mailchimp = $this->getMailchimp();

        $this->assertInstanceOf(Mailchimp_Vip::class, $mailchimp->vip());
    }

    protected function getMailchimp()
    {
        $token = '1234567890';

        return new Mailchimp($token);
    }
}
