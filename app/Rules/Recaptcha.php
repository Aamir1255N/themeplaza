<?php

namespace App\Rules;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\ValidationRule;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
    public function passes($attribute, $value)
    {
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret'   => config('services.recaptcha.secret_key'),
                'response' => $value
            ]
        ]);

        $body = json_decode((string) $response->getBody());

        return $body->success;
    }

    public function message()
    {
        return 'The reCAPTCHA verification failed. Please try again.';
    }
}