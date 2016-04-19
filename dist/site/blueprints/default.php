<?php if(!defined('KIRBY')) exit ?>

title: Page
icon: file-text
pages: true
  template:
    - default
files:
  sortable: true
  fields:
    title:
      label: Title
      type: text
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  markdown
  relatedproducts:
    label: Related products
    type: structure
    entry: >
      {{product}}
    fields:
      product:
        label: Related product
        type: select
        options: query
        query:
          page: shop
          fetch: pages
          template: product
