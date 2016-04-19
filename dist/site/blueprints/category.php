<?php if(!defined('KIRBY')) exit ?>

title: Product category
icon: folder
pages: true
  template:
    - product
    - category
files:
  sortable: true
  type: image
  fields:
    title:
      label: Title
      type: text
fields:
  title:
    label: Title
    type:  text
  text:
    label: Description
    type:  markdown
