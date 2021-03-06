Introduction
============
Shoehorn theme.

![image1](pix/screenshot.png "Shoehorn screenshot")

About
=====
![image2](pix/Shoehorn_logo_sm.png "Shoehorn logo")
 * copyright  &copy; 2014-onwards G J Barnard in respect to modifications of the Bootstrap theme for Moodle.
 * author     G J Barnard - http://about.me/gjbarnard and http://moodle.org/user/profile.php?id=442195
 * author     Based on code originally written by Bas Brands, David Scotson and many other contributors.
 * license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later

Required version of Moodle
==========================
This version works with Moodle version 2013111800 release 2.6 (Build: 20131118) and above within the 2.6 branch until the
next release.

Please ensure that your hardware and software complies with 'Requirements' in 'Installing Moodle' on
'docs.moodle.org/26/en/Installing_Moodle'.

Required version of Bootstrap 3
===============================
The Bootstrap 3 theme for Moodle is currently under development, so I maintain a 'fork' upon which I test against.  This is
here: https://github.com/gjb2048/theme_bootstrap

Each time I make a release I will 'tag' the version to use.  Please see the 'Version information' below for details on the
'tag' to use and install in the same way as Shoehorn.

The main development is maintained here: https://github.com/bmbrands/theme_bootstrap

I would like to thank Bas Brands and David Scotson for their work on the theme.  With a special mention to: Stuart Lamour,
Mark Aberdour, Paul Hibbitts, Mary Evans and Joby Harding.

Installation
============
 1. Ensure you have the version of Moodle as stated above in 'Required version of Moodle'.  This is essential as the
    theme relies on underlying core code that is out of my control.
 2. Login as an administrator and put Moodle in 'Maintenance Mode' so that there are no users using it bar you as the administrator.
 3. Copy the extracted 'shoehorn' folder to the '/theme/' folder.
 4. Go to 'Site administration' -> 'Notifications' and follow standard the 'plugin' update notification.
 5. Select as the theme for the site.
 6. Put Moodle out of Maintenance Mode.

Upgrading
=========
 1. Ensure you have the version of Moodle as stated above in 'Required version of Moodle'.  This is essential as the
    theme relies on underlying core code that is out of my control.
 2. Login as an administrator and put Moodle in 'Maintenance Mode' so that there are no users using it bar you as the administrator.
 3. Make a backup of your old 'shoehorn' folder in '/theme/' and then delete the folder.
 4. Copy the replacement extracted 'shoehorn' folder to the '/theme/' folder.
 5. Go to 'Site administration' -> 'Notifications' and follow standard the 'plugin' update notification.
 6. If automatic 'Purge all caches' appears not to work by lack of display etc. then perform a manual 'Purge all caches'
   under 'Home -> Site administration -> Development -> Purge all caches'.
 7. Put Moodle out of Maintenance Mode.

Uninstallation
==============
 1. Put Moodle in 'Maintenance Mode' so that there are no users using it bar you as the administrator.
 2. Change the theme to another theme of your choice.
 3. In '/theme/' remove the folder 'shoehorn'.
 4. Put Moodle out of Maintenance Mode.

Reporting issues
================
Before reporting an issue, please ensure that you are running the latest version for your release of Moodle.  It is essential
that you are operating the required version of Moodle as stated at the top - this is because the theme relies on core
functionality that is out of its control.

I operate a policy that I will fix all genuine issues for free.  Improvements are at my discretion.  I am happy to make bespoke
customisations / improvements for a negotiated fee. 

When reporting an issue you can post in the theme's forum on Moodle.org (currently 'moodle.org/mod/forum/view.php?id=46')
or check the issue list https://github.com/gjb2048/moodle-theme_shoehorn/issues and if the problem does not exist, create an
issue.

It is essential that you provide as much information as possible, the critical information being the contents of the theme's 
'version.php' file.  Other version information such as specific Moodle version, theme name and version also helps.  A screen shot
can be really useful in visualising the issue along with any files you consider to be relevant.

Todo
====
1. Consider moving fluid container setting from Bootstrap 3 settings.
2. Fix D&D moving blocks into the page-bottom region and moving around not having the right width / position.

Version information
===================
 2nd April 2014 - Version 2.6.0.2 - DO NOT INSTALL ON PRODUCTION SERVERS.
  1.  Bootstrap parent: https://github.com/gjb2048/theme_bootstrap/releases/tag/V2014032100
  2.  Beta development version.

 8th March 2014 - Version 2.6.0.1 - DO NOT INSTALL ON PRODUCTION SERVERS.
  1.  Alpha development version.
  2.  Dynamic social icon colour footer sign.
  3.  Dynamic customisable footer menu.

Thanks
======
My thanks go to all the creators and participants of the Bootstrap theme:
Bas Brands, David Scotson and many other contributors.

Me
==
G J Barnard MSc. BSc(Hons)(Sndw). MBCS. CEng. CITP. PGCE.
Moodle profile: http://moodle.org/user/profile.php?id=442195
Web profile   : http://about.me/gjbarnard
