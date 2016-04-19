<?php if(!defined('KIRBY')) exit ?>

title: Contact page
icon: envelope
pages: false
files:
  sortable: true
  fields:
    title:
      label: Title
      type: text
deletable: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  markdown
  phone:
    label: Phone Number
    type: tel
    width: 1/2
  email:
    label: Email
    type: email
    validate: email
    width: 1/2
  facebook:
    label: Facebook
    type: text
    icon: facebook
    width: 1/2
  google_plus:
    label: Google Plus
    type: text
    icon: google-plus
    width: 1/2
  twitter:
    label: Twitter
    type: text
    icon: twitter
    width: 1/2
  instagram:
    label: Instagram
    type: text
    icon: instagram
    width: 1/2
  location:
    label: Location
    type: place
    center:
      lat: 31.80533
      lng: -106.26559
      zoom: 19
    help: "Move the pin wherever you'd like, or search for a location!"
