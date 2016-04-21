<?php if(!defined('KIRBY')) exit ?>

title: Site options
pages: true
  template:
    - default
files:
  sortable: true
  type: image
  fields:
    title:
      label: Title
      type: text
fields:
  tab1:
    label: General
    type: tabs
  title:
    label: Site title
    type:  text
  footer_links:
    label: Footer Navigation Links
    help: Select links to be displayed on the footer
    type: multiselect
    search: true
    options: children
  placeholder:
    label: Placeholder photo
    help: For products and pages that don't have a photo
    type:  selector
    mode:  single
    types:
      - image
