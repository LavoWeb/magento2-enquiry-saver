# LavoWeb Enquiry Saver

## Overview

A simple Magento 2 module that allows you to save contact form enquiries within the Magento admin.

## Requirements

Magento 2.x

## Installation

This module will add a table to your Magento 2 database. As with any third party modules that do this, it is recommended
that you backup your database before installation.

Copy the contents of the module into your Magento root directory.

Enable the module via the command line:

```
php bin/magento module:enable LavoWeb_EnquirySaver
```

Run the database upgrade via the command line:

```
php bin/magento setup:upgrade
```

Run the compile command and refresh the Magento cache:

```
php bin/magento setup:di:compile 
php bin/magento cache:clean
```

## Usage

Enable enquiry saving in Stores -> Configuration -> General -> Contacts

View the saved enquiries under Marketing -> Communications -> Contact Form Enquiries
