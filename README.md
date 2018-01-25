# TAKE OFF
WordPress theme based on Underscores with Bootstrap and Advanced Custom Fields.

Take Off is meant to be a resource for new WordPress developers learning to build custom WordPress themes. There are definitely some opinionated choices in this theme, but you are welcome to fork or download this and change as much, or as little, as you want. 

This theme uses Underscores, a lean starter theme for WordPress, as well as Bootstrap 3 (I know 4 is out, but I hate it) as well as Advanced Custom Fields.

## Things you should know

**Bootstrap**

This theme includes [Bootstrap 3.3.7](https://getbootstrap.com/docs/3.3/)

**Advanced Custom Fields**

The features used in this theme require an [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/#pricing-table) license. Sure, you can use it without it, but there is a built in page builder that will be useless without a license. Believe me, it's an expense that is well worth it.

## File Breakdown

#### header.php

**Google Fonts**

*takeoff_google_fonts* includes a function for bringing in Google fonts, edit this line to add your own Google fonts, or do not include any at all. The format should look something like this:

`<?php takeoff_google_fonts('Montserrat:300,700|Lato:400'); ?>`

Replacing with your fonts and weights. Font Name:Weight|SecondFontName:Weight.