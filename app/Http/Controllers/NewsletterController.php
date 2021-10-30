<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{

  //  METHOD TO IMPLEMENT THE MAILCHIMP

  public function subscribe()
  {
    request()->validate(['email' => 'required|email']);

    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
      'apiKey' => config('services.mailchimp.key'),
      'server' => 'us5'
    ]);

    try {
      $response = $mailchimp->lists->addListMember(config('services.mailchimp.list_id'), [
        'email_address' => request('email'),
        'status' => 'subscribed'
      ]);
    } catch (\Exception $e) {
      throw ValidationException::withMessages(['email' => 'This address cannot be added to the list!']);
    }
    return redirect('/')->with('success', 'You address is added to the list!');
  }
}
