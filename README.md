# ChapleanZohoBooksClientBundle

[![build status](https://git.chaplean.coop/open-source/bundle/zoho-books-client-bundle/badges/master/build.svg)](https://git.chaplean.coop/open-source/bundle/zoho-books-client-bundle/commits/master)
[![build status](https://git.chaplean.coop/open-source/bundle/zoho-books-client-bundle/badges/master/coverage.svg)](https://git.chaplean.coop/open-source/bundle/zoho-books-client-bundle/commits/master)


# Prerequisites

This version of the bundle requires Symfony 2.8+.

# Installation

## 1. Composer

```bash
composer require chaplean/zoho-books-client-bundle
```


## 2. AppKernel.php

Add
```php
new Chaplean\Bundle\ZohoInvoiceClientBundle\ChapleanZohoBooksClientBundle(),
```


# Configuration

## 1. config.yml 
```yml
imports:
    - { resource: '@ChapleanZohoBooksClientBundle/Resources/config/config.yml' }
```

## 2. parameters.yml
```yml
chaplean_zoho_books.access_token: 'your access token'
chaplean_zoho_books.organization_id: 'your organization id'
```

# Available functions:
* Contacts
    * getContacts()
    * getContactPersons()
    
* Items
    * getItems()
    * getItem()
    * postItem()
    * putItem()
    * deleteItem()
    * postItemActive()
    * postItemInactive()

* Estimate
    * getEstimate()
    * getEstimates()
    * postEstimate()
    * putEstimate()
    * deleteEstimate()
    * postEstimateAsDeclined()
    * postEstimateAsAccepted()

* Invoice
    * getInvoice()
    * getInvoices()
    * postInvoice()
    * putInvoice()
    * deleteInvoice()
