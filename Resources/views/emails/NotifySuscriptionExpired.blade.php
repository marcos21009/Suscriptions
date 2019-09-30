<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  @includeFirst(['suscriptions.emails.style', 'suscriptions::emails.base.style'])

</head>

<body>
<div id="body">
  <div id="template-mail">

    @includeFirst(['suscriptions.emails.header', 'suscriptions::emails.base.header'])



    {{-- ***** Suscription Content  ***** --}}
    <div id="contend-mail" class="p-3">

      {{-- ***** Title  ***** --}}
      <h3 class="text-left text-uppercase">
        {{trans('suscriptions::common.email.messages.hi')}} {{$subscription->user->first_name}},
      </h3>
      {{-- ***** Body  ***** --}}
      <div class="text-center">
        <h4>
          {{trans('suscriptions::common.email.messages.subscription expired body')}}
        </h4>
      </div>
      <br>
      <div class="text-center">
        {{-- ***** URL  ***** --}}
        <p class="px-3">
          <a href="{{env('APP_URL')}}" target="_blank" class="btn btn-primary">Ir al sitio</a>
        </p>
      </div>

    </div>
    {{-- ***** End Subscription content Content  ***** --}}



    @includeFirst(['suscriptions.emails.footer', 'suscriptions::emails.base.footer'])


  </div>
</div>
</body>

</html>
