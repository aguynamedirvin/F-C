<?php if(!defined('KIRBY')) exit ?>

title: Account settings page
pages: true
  template:
    - default
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
