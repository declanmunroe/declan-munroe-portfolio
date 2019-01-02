<h2> Dear {{ $email }}, </h2>

<p>Your api token is : <strong>{{ $token }}</strong></p>

<p>Your endpoint url to access api is <a href="<?= url('/'); ?>/testapi?token={{ $token }}"><?= url('/'); ?>/testapi?token={{ $token }}</a>
