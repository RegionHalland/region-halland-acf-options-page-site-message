# Skapa en sida i admin med ett formulär för 'Viktiga meddelanden'

## Hur man använder Region Hallands plugin "region-halland-options-page-site-message"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-options-page-site-message".


## Användningsområde

Denna plugin skapar en array() med all formulärdata för viktiga meddelanden


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-options-page-site-message.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-options-page-site-message.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-options-page-site-message": "1.0.0"
},
```


## Visa "Viktigt meddelande" via "Blade"

```sh
@php($myMessage = get_region_halland_acf_site_message())    
@if($myMessage['show_message'] == true)
  <span>{!! $myMessage['rubrik'] !!}</span><br>
  <span>{!! $myMessage['meddelande'] !!}</span><br>
  <a href="{{ $myMessage['link_url'] }}" target="{{ $myMessage['link_target'] }}">{{ $myMessage['link_title'] }}</a>
@endif
```
        

## Exempel på hur arrayen kan se ut

```sh
array (size=6)
  'rubrik' => string 'Viktigt meddelande' (length=18)
  'meddelande' => string 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' (length=56)
  'link_title' => string 'Lorem Ipsim' (length=11)
  'link_url' => string 'http://exempel.se/lorem-ipsum/' (length=30)
  'link_target' => string '_blank' (length=6)
  'show_message' => boolean true
```

## Versionhistorik

### 1.0.0
- Första version