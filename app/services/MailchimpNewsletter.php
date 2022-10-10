<?php

namespace App\Services;

use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use App\Services\MailchimpNewsletter;
use MailchimpMarketing\MailchimpMarketing;

/**
 *
 */
class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    {
    }

    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');


        return $this->client->lists->addListMember(
            $list,
            [
                "email_address" => $email,
                "status" => "subscribed",
                ]
        );
    }
}
