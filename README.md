**Please do not use this bot anymore. Please refer to [this page](deprecation.md). Thank you**

To get random quotes for your channel, you need Nightbot. Then run the following
commands:

    !addcom !quote $(customapi http://joules.himmel-villmar.de/quote.php?s=YOUR_CHANNEL)
    !addcom -ul=mod !addquote $(customapi http://joules.himmel-villmar.de/addquote.php?s=YOUR_CHANNEL&q=$(query))

You obviously have to substitute `YOUR_CHANNEL` for your actual channel. Afaik,
using unicode is a bad idea. There currently is no way to delete quotes; if you
need to delete one, shoot me a Twitch message: twitch.tv/magguzo

Have fun!
