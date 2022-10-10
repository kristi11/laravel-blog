<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Gate;
use App\Services\MailchimpNewsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
            $client = new ApiClient();

            $client->setConfig(
                [
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'your-server-nr-here'
                ]
            );
            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        // Define the gate checking if user is admin or no(or whatever we define).If yes than the user can access certain parts of the site.
        Gate::define('admin', function (User $user) {
            return $user->admin == true ;
        });
    }
}
