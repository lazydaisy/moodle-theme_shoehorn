<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Shoelace theme with the underlying Bootstrap theme.
 *
 * @package    theme
 * @subpackage shoehorn
 * @copyright  &copy; 2014-onwards G J Barnard in respect to modifications of the Bootstrap theme.
 * @author     G J Barnard - gjbarnard at gmail dot com and {@link http://moodle.org/user/profile.php?id=442195}
 * @author     Based on code originally written by Bas Brands, David Scotson and many other contributors.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

// Settings
    $settings = null;
    $ADMIN->add('themes', new admin_category('theme_shoehorn', 'Shoehorn'));

    $generalsettings = new admin_settingpage('theme_shoehorn_general', get_string('generalsettings', 'theme_shoehorn'));

    /* CDN Fonts - 1 = no, 2 = yes. */
    $name = 'theme_shoehorn/cdnfonts';
    $title = get_string('cdnfonts', 'theme_shoehorn');
    $description = get_string('cdnfonts_desc', 'theme_shoehorn');
    $default = 1;
    $choices = array(
        1 => new lang_string('no'),   // No.
        2 => new lang_string('yes')   // Yes.
    );
    $generalsettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    // Use Glyphicon font.
    $name = 'theme_shoehorn/fonticons';
    $title = get_string('fonticons', 'theme_shoehorn');
    $description = get_string('fonticons_desc', 'theme_shoehorn');
    $setting = new admin_setting_configcheckbox($name, $title, $description, '0');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    // Invert Navbar to dark background.
    $name = 'theme_shoehorn/inversenavbar';
    $title = get_string('inversenavbar', 'theme_shoehorn');
    $description = get_string('inversenavbar_desc', 'theme_shoehorn');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    // Logo file setting.
    $name = 'theme_shoehorn/logo';
    $title = get_string('logo','theme_shoehorn');
    $description = get_string('logo_desc', 'theme_shoehorn');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    // Number of page bottom blocks.
    $name = 'theme_shoehorn/numpagebottomblocks';
    $title = get_string('numpagebottomblocks','theme_shoehorn');
    $description = get_string('numpagebottomblocks_desc', 'theme_shoehorn');
    $choices = array(
        1 => new lang_string('one', 'theme_shoehorn'),
        2 => new lang_string('two', 'theme_shoehorn'),
        3 => new lang_string('three', 'theme_shoehorn'),
        4 => new lang_string('four', 'theme_shoehorn')
    );
    $default = 2;
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $generalsettings->add($setting);

    // Footer menu.
    $name = 'theme_shoehorn/footermenu';
    $title = get_string('footermenu', 'theme_shoehorn');
    $description = get_string('footermenu_desc', 'theme_shoehorn');
    $default = 'About Shoehorn|[[site]]/theme/shoehorn/pages/about.php|About Shoehorn';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    // Copyright text.
    $name = 'theme_shoehorn/copyright';
    $title = get_string('copyright', 'theme_shoehorn');
    $description = get_string('copyright_desc', 'theme_shoehorn');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    // Custom CSS file.
    $name = 'theme_shoehorn/customcss';
    $title = get_string('customcss', 'theme_shoehorn');
    $description = get_string('customcss_desc', 'theme_shoehorn');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    // Login message.
    $generalsettings->add(new admin_setting_heading('theme_shoehorn_loginmessage', get_string('loginpage', 'theme_shoehorn'),
            format_text(get_string('loginpage_desc', 'theme_shoehorn'), FORMAT_MARKDOWN)));

    $name = 'theme_shoehorn/showloginmessage';
    $title = get_string('showloginmessage', 'theme_shoehorn');
    $description = get_string('showloginmessage_desc', 'theme_shoehorn').html_writer::tag('a',
        get_string('showloginmessage_urlname', 'theme_shoehorn'), array('href' => get_string('showloginmessage_urllink', 'theme_shoehorn'),
        'target' => '_blank'))."'.";
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    $name = 'theme_shoehorn/loginmessage';
    $title = get_string('loginmessage', 'theme_shoehorn');
    $description = get_string('loginmessage_desc', 'theme_shoehorn');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    $ADMIN->add('theme_shoehorn', $generalsettings);

    // Front page slider page....
    // Number of front page slides.
    $name = 'theme_shoehorn/frontpagenumberofslides';
    $title = get_string('frontpagenumberofslides', 'theme_shoehorn');
    $description = get_string('frontpagenumberofslides_desc', 'theme_shoehorn');
    $default = 3;
    $choices = array(
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14',
        15 => '15',
        16 => '16'
    );
    $slidersettings = new admin_settingpage('theme_shoehorn_slider', get_string('frontpagesliderheading', 'theme_shoehorn'));
    $slidersettings->add(new admin_setting_heading('theme_moment_slider', get_string('frontpagesliderheadingsub', 'theme_shoehorn'),
            format_text(get_string('frontpagesliderheadingdesc', 'theme_shoehorn'), FORMAT_MARKDOWN)));
    $slidersettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    // Slide speed.
    $name = 'theme_shoehorn/frontpagesliderspeed';
    $title = get_string('frontpagesliderspeed', 'theme_shoehorn');
    $description = get_string('frontpagesliderspeed_desc', 'theme_shoehorn');
    $default = 5000;
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_INT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $slidersettings->add($setting);

    // Show on mobile.
    $name = 'theme_shoehorn/frontpageslidermobile';
    $title = get_string('frontpageslidermobile', 'theme_shoehorn');
    $description = get_string('frontpageslidermobile_desc', 'theme_shoehorn');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $slidersettings->add($setting);

    // Show on tablet.
    $name = 'theme_shoehorn/frontpageslidertablet';
    $title = get_string('frontpageslidertablet', 'theme_shoehorn');
    $description = get_string('frontpageslidertablet_desc', 'theme_shoehorn');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $slidersettings->add($setting);

    // Language variables for settings....
    $langpackurl = new moodle_url('/admin/tool/langimport/index.php');
    $langsinstalled = array_merge(array('all' => get_string('all')), get_string_manager()->get_list_of_translations());

    $numberofslides = get_config('theme_shoehorn', 'frontpagenumberofslides');
    for ($i = 1; $i <= $numberofslides; $i++) {
        $slidersettings->add(new admin_setting_heading('theme_shoehorn_frontpageslidet_heading'.$i, get_string('frontpageslidersettingspageheading', 'theme_shoehorn', array('slide' => $i)), null));

        // Image.
        $name = 'theme_shoehorn/frontpageslideimage'.$i;
        $title = get_string('frontpageslideimage', 'theme_shoehorn', array('slide' => $i));
        $description = get_string('frontpageslideimage_desc', 'theme_shoehorn', array('slide' => $i));
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'frontpageslideimage'.$i);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $slidersettings->add($setting);

        // URL.
        $name = 'theme_shoehorn/frontpageslideurl'.$i;
        $title = get_string('frontpageslideurl', 'theme_shoehorn', array('slide' => $i));
        $description = get_string('frontpageslideurl_desc', 'theme_shoehorn', array('slide' => $i));
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $slidersettings->add($setting);

        // Caption title.
        $name = 'theme_shoehorn/frontpageslidecaptiontitle'.$i;
        $title = get_string('frontpageslidecaptiontitle', 'theme_shoehorn', array('slide' => $i));
        $description = get_string('frontpageslidecaptiontitle_desc', 'theme_shoehorn', array('slide' => $i));
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $slidersettings->add($setting);

        // Caption text.
        $name = 'theme_shoehorn/frontpageslidecaptiontext'.$i;
        $title = get_string('frontpageslidecaptiontext', 'theme_shoehorn', array('slide' => $i));
        $description = get_string('frontpageslidecaptiontext_desc', 'theme_shoehorn', array('slide' => $i));
        $default = '';
        $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_TEXT);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $slidersettings->add($setting);

        // Status.
        $name = 'theme_shoehorn/frontpageslidestatus'.$i;
        $title = get_string('frontpageslidestatus', 'theme_shoehorn', array('slide' => $i));
        $description = get_string('frontpageslidestatus_desc', 'theme_shoehorn');
        $default = 1;
        $choices = array(
            1 => new lang_string('draft', 'theme_shoehorn'),
            2 => new lang_string('published', 'theme_shoehorn')
        );
        $slidersettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

        // Display.
        $name = 'theme_shoehorn/frontpageslidedisplay'.$i;
        $title = get_string('frontpageslidedisplay', 'theme_shoehorn', array('slide' => $i));
        $description = get_string('frontpageslidedisplay_desc', 'theme_shoehorn', array('slide' => $i));
        $default = 1;
        $choices = array(
            1 => new lang_string('always', 'theme_shoehorn'),
            2 => new lang_string('loggedout', 'theme_shoehorn'),
            3 => new lang_string('loggedin', 'theme_shoehorn')
        );

        $slidersettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));
        // Slider language only.
        $name = 'theme_shoehorn/frontpageslidelang'.$i;
        $title = get_string('frontpageslidelang', 'theme_shoehorn', array('slide' => $i));
        $description = get_string('frontpageslidelang_desc', 'theme_shoehorn', array('slide' => $i, 'url' => html_writer::tag('a', get_string('langpack_urlname', 'theme_shoehorn'), array(
                       'href' => $langpackurl, 'target' => '_blank'))));
        $default = 'all';
        $setting = new admin_setting_configselect($name, $title, $description, $default, $langsinstalled);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $slidersettings->add($setting);
    }
    $ADMIN->add('theme_shoehorn', $slidersettings);

    // Image bank....
    // Number of images in the image bank.
    $name = 'theme_shoehorn/numberofimagebankimages';
    $title = get_string('numberofimagebankimages', 'theme_shoehorn');
    $description = get_string('numberofimagebankimages_desc', 'theme_shoehorn');
    $default = 0;
    $choices = array(
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14',
        15 => '15',
        16 => '16'
    );

    $theme = theme_config::load('shoehorn');
    $imagebanksettings = new admin_settingpage('theme_shoehorn_imagebank', get_string('imagebankheading', 'theme_shoehorn'));
    $imagebanksettings->add(new admin_setting_heading('theme_shoehorn_marketingspots', get_string('imagebankheadingsub', 'theme_shoehorn'),
            format_text(get_string('imagebankheadingdesc', 'theme_shoehorn'), FORMAT_MARKDOWN)));

    $imagebanksettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));
    $numberofimagebankimages = get_config('theme_shoehorn', 'numberofimagebankimages');
    for ($i = 1; $i <= $numberofimagebankimages; $i++) {
        $name = 'imagebankimage'.$i;
        $settingname = 'theme_shoehorn/'.$name;
        $title = get_string('imagebankimage','theme_shoehorn').$i;
        if (empty($theme->settings->$name)) {
            $imagedesc = get_string('none', 'theme_shoehorn');
        } else {
            $imagedesc = $theme->setting_file_url($name, $name);
        }
        $description = get_string('imagebankimage_desc', 'theme_shoehorn', array('imagedesc' => $imagedesc));
        $setting = new admin_setting_configstoredfile($settingname, $title, $description, $name);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $imagebanksettings->add($setting);
    }
    $ADMIN->add('theme_shoehorn', $imagebanksettings);

    // Marketing spots....
    // Number of marketing spots.
    $name = 'theme_shoehorn/numberofmarketingspots';
    $title = get_string('numberofmarketingspots', 'theme_shoehorn');
    $description = get_string('numberofmarketingspots_desc', 'theme_shoehorn');
    $default = 1;
    $choices = array(
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4'
    );
    $marketingspotssettings = new admin_settingpage('theme_shoehorn_marketingspots', get_string('marketingspotsheading', 'theme_shoehorn'));
    $marketingspotssettings->add(new admin_setting_heading('theme_shoehorn_marketingspots', get_string('marketingspotsheadingsub', 'theme_shoehorn'),
            format_text(get_string('marketingspotsheadingdesc', 'theme_shoehorn'), FORMAT_MARKDOWN)));
    $marketingspotssettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    $numberofmarketingspots = get_config('theme_shoehorn', 'numberofmarketingspots');
    for ($i = 1; $i <= $numberofmarketingspots; $i++) {
        $marketingspotssettings->add(new admin_setting_heading('theme_shoehorn_marketingspot_heading'.$i, get_string('marketingspotsettingspageheading', 'theme_shoehorn', array('spot' => $i)), null));

        // Marketing spot heading.
        $name = 'theme_shoehorn/marketingspotheading'.$i;
        $title = get_string('marketingspotheading', 'theme_shoehorn', array('spot' => $i));
        $description = get_string('marketingspotheading_desc', 'theme_shoehorn', array('spot' => $i));
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $marketingspotssettings->add($setting);

        // Marketing spot content.
        $name = 'theme_shoehorn/marketingspotcontent'.$i;
        $title = get_string('marketingspotcontent', 'theme_shoehorn', array('spot' => $i));
        $description = get_string('marketingspotcontent_desc', 'theme_shoehorn', array('spot' => $i));
        $default = '';
        $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $marketingspotssettings->add($setting);

        // Status.
        $name = 'theme_shoehorn/marketingspotstatus'.$i;
        $title = get_string('marketingspotstatus', 'theme_shoehorn', array('spot' => $i));
        $description = get_string('marketingspotstatus_desc', 'theme_shoehorn');
        $default = 1;
        $choices = array(
            1 => new lang_string('draft', 'theme_shoehorn'),
            2 => new lang_string('published', 'theme_shoehorn')
        );
        $marketingspotssettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

        // Display.
        $name = 'theme_shoehorn/marketingspotdisplay'.$i;
        $title = get_string('marketingspotdisplay', 'theme_shoehorn', array('spot' => $i));
        $description = get_string('marketingspotdisplay_desc', 'theme_shoehorn', array('spot' => $i));
        $default = 1;
        $choices = array(
            1 => new lang_string('always', 'theme_shoehorn'),
            2 => new lang_string('loggedout', 'theme_shoehorn'),
            3 => new lang_string('loggedin', 'theme_shoehorn')
        );
        $marketingspotssettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

        // Marketing spot language only.
        $name = 'theme_shoehorn/marketingspotlang'.$i;
        $title = get_string('marketingspotlang', 'theme_shoehorn', array('spot' => $i));
        $description = get_string('marketingspotlang_desc', 'theme_shoehorn', array('spot' => $i, 'url' => html_writer::tag('a', get_string('langpack_urlname', 'theme_shoehorn'), array(
                       'href' => $langpackurl, 'target' => '_blank'))));
        $default = 'all';
        $setting = new admin_setting_configselect($name, $title, $description, $default, $langsinstalled);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $marketingspotssettings->add($setting);
    }
    $ADMIN->add('theme_shoehorn', $marketingspotssettings);

    // Site pages....
    // Number of site pages.
    $name = 'theme_shoehorn/numberofsitepages';
    $title = get_string('numberofsitepages', 'theme_shoehorn');
    $description = get_string('numberofsitepages_desc', 'theme_shoehorn');
    $default = 1;
    $choices = array(
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14',
        15 => '15',
        16 => '16'
    );

    $sitepagessettings = new admin_settingpage('theme_shoehorn_sitepages', get_string('sitepagesheading', 'theme_shoehorn'));
    $sitepagessettings->add(new admin_setting_heading('theme_shoehorn_sitepages', get_string('sitepagesheadingsub', 'theme_shoehorn'),
            format_text(get_string('sitepagesheadingdesc', 'theme_shoehorn'), FORMAT_MARKDOWN)));
    $sitepagessettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    $numberofsitepages = get_config('theme_shoehorn', 'numberofsitepages');
    for ($i = 1; $i <= $numberofsitepages; $i++) {
        $sitepagessettings->add(new admin_setting_heading('theme_shoehorn_sitepage_heading'.$i, get_string('sitepagesettingspageheading', 'theme_shoehorn', array('pageid' => $i)), null));

        // Site page title.
        $name = 'theme_shoehorn/sitepagetitle'.$i;
        $title = get_string('sitepagetitle', 'theme_shoehorn', array('pageid' => $i));
        $description = get_string('sitepagetitle_desc', 'theme_shoehorn', array('pageid' => $i));
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $sitepagessettings->add($setting);

        // Site page heading.
        $name = 'theme_shoehorn/sitepageheading'.$i;
        $title = get_string('sitepageheading', 'theme_shoehorn', array('pageid' => $i));
        $description = get_string('sitepageheading_desc', 'theme_shoehorn', array('pageid' => $i));
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $sitepagessettings->add($setting);

        // Site page content.
        $name = 'theme_shoehorn/sitepagecontent'.$i;
        $title = get_string('sitepagecontent', 'theme_shoehorn', array('pageid' => $i));
        $description = get_string('sitepagecontent_desc', 'theme_shoehorn', array('pageid' => $i));
        $default = '';
        $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $sitepagessettings->add($setting);

        // Status.
        $name = 'theme_shoehorn/sitepagestatus'.$i;
        $title = get_string('sitepagestatus', 'theme_shoehorn', array('pageid' => $i));
        $description = get_string('sitepagestatus_desc', 'theme_shoehorn');
        $default = 1;
        $choices = array(
            1 => new lang_string('draft', 'theme_shoehorn'),
            2 => new lang_string('published', 'theme_shoehorn')
        );
        $sitepagessettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

        // Display.
        $name = 'theme_shoehorn/sitepagedisplay'.$i;
        $title = get_string('sitepagedisplay', 'theme_shoehorn', array('pageid' => $i));
        $description = get_string('sitepagedisplay_desc', 'theme_shoehorn', array('pageid' => $i));
        $default = 1;
        $choices = array(
            1 => new lang_string('always', 'theme_shoehorn'),
            2 => new lang_string('loggedout', 'theme_shoehorn'),
            3 => new lang_string('loggedin', 'theme_shoehorn')
        );
        $sitepagessettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

        // Site page language only.
        $name = 'theme_shoehorn/sitepagelang'.$i;
        $title = get_string('sitepagelang', 'theme_shoehorn', array('pageid' => $i));
        $description = get_string('sitepagelang_desc', 'theme_shoehorn', array('pageid' => $i, 'url' => html_writer::tag('a', get_string('langpack_urlname', 'theme_shoehorn'), array(
                       'href' => $langpackurl, 'target' => '_blank'))));
        $default = 'all';
        $setting = new admin_setting_configselect($name, $title, $description, $default, $langsinstalled);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $sitepagessettings->add($setting);
    }
    $ADMIN->add('theme_shoehorn', $sitepagessettings);

    // Social links page....
    // Number of social links.
    $name = 'theme_shoehorn/numberofsociallinks';
    $title = get_string('numberofsociallinks', 'theme_shoehorn');
    $description = get_string('numberofsociallinks_desc', 'theme_shoehorn');
    $default = 2;
    $choices = array(
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14',
        15 => '15',
        16 => '16'
    );

    $socialsettings = new admin_settingpage('theme_shoehorn_social', get_string('socialheading', 'theme_shoehorn'));
    $socialsettings->add(new admin_setting_heading('theme_shoehorn_social', get_string('socialheadingsub', 'theme_shoehorn'),
            format_text(get_string('socialheadingdesc', 'theme_shoehorn'), FORMAT_MARKDOWN)));
    $socialsettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    $numberofsociallinks = get_config('theme_shoehorn', 'numberofsociallinks');
    for ($i = 1; $i <= $numberofsociallinks; $i++) {
        // Social url setting.
        $name = 'theme_shoehorn/social'.$i;
        $title = get_string('socialnetworklink', 'theme_shoehorn').$i;
        $description = get_string('socialnetworklink_desc', 'theme_shoehorn').$i;
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $socialsettings->add($setting);

        // Social icon setting.
        $name = 'theme_shoehorn/socialicon'.$i;
        $title = get_string('socialnetworkicon', 'theme_shoehorn').$i;
        $description = get_string('socialnetworkicon_desc', 'theme_shoehorn').$i;
        $default = 'globe';
        $choices = array(
            'dropbox' => 'Dropbox',
            'facebook-square' => 'Facebook',
            'flickr' => 'Flickr',
            'github' => 'Github',
            'google-plus-square' => 'Google Plus',
            'instagram' => 'Instagram',
            'linkedin-square' => 'Linkedin',
            'pinterest-square' => 'Pinterest',
            'skype' => 'Skype',
            'tumblr-square' => 'Tumblr',
            'twitter-square' => 'Twitter',
            'users' => 'Unlisted',
            'vimeo-square' => 'Vimeo',
            'vk' => 'Vk',
            'globe' => 'Website',
            'youtube-square' => 'YouTube'
        );
        $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $socialsettings->add($setting);
    }
    $ADMIN->add('theme_shoehorn', $socialsettings);
