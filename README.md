# Laravel Socialite Meetup.com OAuth2 Provider

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->
## Contents

- [Installation](#installation)
  - [1. Composer](#1-composer)
  - [2. Service Provider](#2-service-provider)
  - [3. Add the Event and Listeners](#3-add-the-event-and-listeners)
  - [4. Services Array and .env](#4-services-array-and-env)
- [Usage](#usage)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## Installation

### 1. Composer

```bash
// This assumes that you have composer installed globally
composer require socialiteproviders/meetup
```

### 2. Service Provider

* [See the docs on how to install the `SocialiteProviders` service provider.](https://github.com/SocialiteProviders/Manager#2-service-provider)


### 3. Add the Event and Listeners

* The listener that you will be adding is `'SocialiteProviders\Meetup\MeetupExtendSocialite@handle',`. 

* [See the docs on how to install](https://github.com/SocialiteProviders/Manager#3-add-the-event-and-listeners)

### 4. Services Array and .env

* Add to `config/services.php`.  
 
```php
'meetup' => [
    'client_id' => env('MEETUP_KEY'),
    'client_secret' => env('MEETUP_SECRET'),
    'redirect' => env('MEETUP_REDIRECT_URI'),
]
```

* Append provider values to your `.env` file

```php
// other values above
MEETUP_KEY=yourkeyfortheservice
MEETUP_SECRET=yoursecretfortheservice
MEETUP_REDIRECT_URI=https://example.com/login
```

* [See the main docs for more information](https://github.com/SocialiteProviders/Manager#4-services-array-and-env)


## Usage

* You should now be able to use it like you would regularly use Socialite:

```php
return Socialite::with('meetup')->redirect();
```

* [See the main docs for more information](https://github.com/SocialiteProviders/Manager#usage)
