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

use Mailchimp as BaseMailchimp;

/**
 * This is the mailchimp class.
 *
 * @author James Brooks <james@bluebaytravel.co.uk>
 */
class Mailchimp
{
    /**
     * The mailchimp instance.
     *
     * @var \Mailchimp
     */
    protected $mailchimp;

    /**
     * Create a new mailchimp instance.
     *
     * @param string $token
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->mailchimp = new BaseMailchimp($token);
    }

    /**
     * Folders related.
     *
     * @return \Mailchimp_Folders
     */
    public function folders()
    {
        return $this->mailchimp->folders;
    }

    /**
     * Templates related.
     *
     * @return \Mailchimp_Templates
     */
    public function templates()
    {
        return $this->mailchimp->templates;
    }

    /**
     * Users related.
     *
     * @return \Mailchimp_Users
     */
    public function users()
    {
        return $this->mailchimp->users;
    }

    /**
     * Helper related.
     *
     * @return \Mailchimp_Helper
     */
    public function helper()
    {
        return $this->mailchimp->helper;
    }

    /**
     * Mobile related.
     *
     * @return \Mailchimp_Mobile
     */
    public function mobile()
    {
        return $this->mailchimp->mobile;
    }

    /**
     * Conversations related.
     *
     * @return \Mailchimp_Conversations
     */
    public function conversations()
    {
        return $this->mailchimp->conversations;
    }

    /**
     * Ecomm related.
     *
     * @return \Mailchimp_Ecomm
     */
    public function ecomm()
    {
        return $this->mailchimp->ecomm;
    }

    /**
     * Neapolitan related.
     *
     * @return \Mailchimp_Neapolitan
     */
    public function neapolitan()
    {
        return $this->mailchimp->neapolitan;
    }

    /**
     * Lists related.
     *
     * @return \Mailchimp_Lists
     */
    public function lists()
    {
        return $this->mailchimp->lists;
    }

    /**
     * Campaigns related.
     *
     * @return \Mailchimp_Campaigns
     */
    public function campaigns()
    {
        return $this->mailchimp->campaigns;
    }

    /**
     * Vip related.
     *
     * @return \Mailchimp_Vip
     */
    public function vip()
    {
        return $this->mailchimp->vip;
    }

    /**
     * Reports related.
     *
     * @return \Mailchimp_Reports
     */
    public function reports()
    {
        return $this->mailchimp->reports;
    }

    /**
     * Gallery related.
     *
     * @return \Mailchimp_Gallery
     */
    public function gallery()
    {
        return $this->mailchimp->gallery;
    }

    /**
     * Goal related.
     *
     * @return \Mailchimp_Goal
     */
    public function goal()
    {
        return $this->mailchimp->goal;
    }
}
