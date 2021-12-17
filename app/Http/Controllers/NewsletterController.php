<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeUserRequest;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{
    /**
     * Method to umplement the Mailchimp.
     * */
    public function subscribe(SubscribeUserRequest $request)
    {
        $request->validated();

        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
      'apiKey' => config('services.mailchimp.key'),
      'server' => 'us5',
    ]);

        try {
            $mailchimp->lists->addListMember(config('services.mailchimp.list_id'), [
        'email_address' => request('email'),
        'status' => 'subscribed',
      ]);
        } catch (\Exception $e) {
            throw ValidationException::withMessages(['email' => 'This address cannot be added to the list!']);
        }

        return redirect(route('home'))->with('success', 'You address is added to the list!');
    }
}
