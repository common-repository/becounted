=== beCounted ===
Contributors: beautomated, seanconklin, randywsandberg
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=B22PPZ3SC6WZE
Tags: widget, widgets, counter, count up, plugin, plugins, wordpress, sidebar, beAutomated, beCounted
Requires at least: 3.2
Tested up to: 4.7.2
Stable tag: 1.1

beCounted creates a multiple item count up widget based on annual statistics showing the number of occurrences since the page was loaded.

== Description ==

beCounted WordPress Plugin creates a multiple item count up widget based on annual statistics showing the number of occurrences since the page was loaded. beCounted supports multiple widget instances and can be displayed on selected pages.

The default statistics that come with beCounted are a set of mythological creatures, including dragons, mermaids, unicorns, and zombies. Administrators can add any number of statistics to this counter, can customize all of the styling, and can add a custom credit blurb beneath the counter display with the ability to add hyperlinks.

Be sure to use statistics that represent a [rate](http://en.wikipedia.org/wiki/Rate_(mathematics) "Read Rate/Mathematics") of occurences over time. Sample statistics are available on [our website](http://www.beautomated.com/becounted/ "Get Sample Statistics for beCounted").

Please visit our [Support Forum](http://wordpress.org/tags/becounted?forum_id=10 "Visit our WordPress Support Forum") if you have any questions or issues regarding this Plugin.

== Installation ==

Automatic Installation

1. Login to your blog and go to the Plugins page.
1. Click on the Add New button.
1. Search for beCounted.
1. Click Install now.
1. (sometimes required) Enter your FTP or FTPS username and password, as provided by your web host.
1. Click Activate Plugin.
1. Add the widget to a widget capable area of your theme through the Appearance->Widgets menu.
1. Expand the Widget options. Enter an optional title and change the sample statistics to the ones you want to display starting with the number of occurrences per year followed by the item title, than click Save.

Manual Installation

1. Download the Plugin and un-zip it.
1. Upload the `becounted` folder to your `wp-content/plugins/` directory.
1. Activate the Plugin through the Plugins menu in WordPress.
1. Add the widget to a widget capable area of your theme through the Appearance->Widgets menu.
1. Expand the Widget options. Enter an optional title and change the sample statistics to the ones you want to display starting with the number of occurrences per year followed by the item title, than click Save.

== Frequently Asked Questions ==

= How can I calculate annual statistics to put into this widget? =

You must convert your statistics to the number of occurrences per year. For example, if you had 1 occurrence of something per second, to convert to years you would multiply that by the following: the number of seconds per minute, the number of minutes per hour, the number of hours per day, and the number of days per year. This math (1x60x60x24x365) gives us 31,536,000 total occurrences per year. As a check, when viewing this statistic on the website you should see one increment occur per second.

= Should I use commas for the thousands separator in my statistics? =

It doesn't matter! We remove commas when processing the statistics, so it's up to you whether or not you prefer entering the data with or without the commas.

= Does this Plugin require the jQuery, Prototype, MooTools, YUI, Google Web Toolkit, Dojo, ... framework? =

No! Fortunately we were able to build this Plugin to be as theme compatible as possible by not requiring any particular framework.

= How can I prevent the widget from showing up on my site until I customize the statistics? =

Anticipating the idea that some folks won't want to display the default statistics on their site while the counter is being configured; one can drag the widget into the Inactive Widgets region, customize it there, then drag it into an active theme region such as a sidebar or footer.

= What units of measurement can be used in the various CSS styling fields? =

* Counter Font Size can be stated in em, ex, px, %, in, cm, mm, pt, pc.
* Counter Inner Padding can be stated in px, %, in, cm, mm, pt, pc.
* Counter Outer Margin can be stated in px, %, in, cm, mm, pt, pc.

== Screenshots ==

1. This is the default widget on Twenty Eleven theme.
2. This is the widget control panel.

== Changelog ==

= 1.1 on 2017-01-28 =

* Fixed: Compatibility with the latest WordPress 4.7.2

= 1.0.3 on 2012-07-17 =

* Fixed: Minor bug with the subtitle display during widget administration.

= 1.0.2 on 2012-06-05 =

* Added: Ability to enter statistics without a corresponding label.

= 1.0.1 on 2011-11-18 =

* Added: Widget title appears in the admin widget bar subtitle area.
* Added: Three new FAQ section questions and answers.
* Updated: Compressed JavaScript code for sites with multiple occurences of the counter.
* Updated: Changed JaveScript enqueue to only load on pages with the counter activated.
* Updated: Put commas in default values for neater presentation.
* Updated: Behavior when label is left out; now leaves the item off the counter.
* Updated: Changed default font size from 1.2em to simply 1em, and removed default color abbreviations.
* Fixed: Bug when apostrophe characters used in the label text was halting counter.
* Fixed: Removed any empty lines in the statistics from displaying in the viewable widget.
* Fixed: HTML label relationships for the CSS styling fields were missing.

= 1.0 on 2011-11-07 =

* Added: Initial Plugin release v1.0.

== Upgrade Notice ==

= 1.0.3 =

* Minor bug fix with the subtitle display during widget administration.

= 1.0.2 =

* Adds ability to enter statistics without a corresponding label.

= 1.0.1 =

* Minor updates and fixed a few minor bugs.

= 1.0 =

* Initial Plugin release.
