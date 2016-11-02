<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BarkPost Messenger</title>

        @include('partials/css')

    </head>
    <body>

        @include('partials/nav')

        <div class="content">

            <div class="row barkpost-landing">

                <div class="col s6">
                  <div class="center">
                    <div class="barkpost-square-img">
                        <a href="/videos">
                            <img class="responsive-img" src="images/videos-welcome.gif">
                        </a>
                    </div>
                    <p class="promo-caption">Video</p>
                    <p class="light center">Create API to send videos through Chatfuel</p>
                  </div>
                </div>

                <div class="col s6">
                  <div class="center">
                    <div class="barkpost-square-img">
                        <a href="/audio-clips">
                            <img class="responsive-img" src="images/audio-welcome.gif">
                        </a>
                    </div>
                    <p class="promo-caption">Audio</p>
                    <p class="light center">Create API to send audio clips through Chatfuel</p>
                  </div>
                </div>

            </div>

        </div>

        @include('partials/js')

    </body>
</html>
