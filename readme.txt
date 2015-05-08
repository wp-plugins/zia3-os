=== Zia3 Opening Sequence ===
Contributors: zia3wp
Donate link: http://plugins.zia3.com/donate/
Tags: onpening sequence, fullscreen splash, background slideshow, zia3, zia3 slideshow, css fullscreen slideshow, css slideshow, responsive, shortcode, landing page, fullscreen, coming soon
Requires at least: 3.5
Tested up to: 4.2.2
Stable tag: 1.0
License: GPLv2+
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Zia3 Opening Sequence is a pure CSS opening screen for any website by <a href="http://plugins.zia3.com/">Serkan Azmi</a>

<h4>What Can This Plugin Do?</h4>

*   Cross browser compatibility
*   Responsive design (will work on any device and screen size)
*   You can specify title and link along with your website slogan and link.

This plugin does one thing and one thing only, to keep it small yet fully functional.


<h4>About the Shortcode:</h4>

There are 6 parameters total that you can use with this shortcode.  The **ID** being the only one that's absolutely **required**.

List of parameters:

*   id
*   title
*   link
*   slogan
*   slogan_link
*   link_color
*   slogan_link_color


`
[zia3_os id="333" link_title="My Title" link="http://mydomain.com/" slogan="My Slogan" slogan_link="http://mydomain.com/" link_color="255,255,255" slogan_link_color="255,255,255"]
`

**NOTE FOR THEME DEVELOPERS:** This plugin makes use of both *wp_head()* and *wp_footer()* so if your theme is missing either you may experience issues using this plugin.

== Installation ==

<h4>Installation</h4>


1.   Upload the plugin zip file to the `/wp-content/plugins/` directory
2.   Activate the plugin through the 'Plugins' menu in WordPress
3.   Use the shortcode [zia3_os id="xxx"]
4.   Customize the slideshow using the parameters explained in <a href="https://wordpress.org/plugins/zia3-opening-sequence/">screenshot #4</a>


<h4>Using the Shortcode</h4>
After you've added your phrases to your opening sequence and generated a shortcode you just need to copy the shortcode and paste it into the content of any page or post you want the opening sequence to show up on.  If you want it to show up on every page you'll have to add some code to the header.php file in your theme.  See the codex's <a href="http://codex.wordpress.org/Function_Reference/do_shortcode">do_shortcode article</a> for more information on the matter.

<a href="https://wordpress.org/plugins/zia3-opening-sequence/">See screenshot #3</a> for a description of the shortcode parameters.

== Screenshots ==

1. Demonstration 1
2. Demonstration 2
2. Backend Example
4. Shortcode Generator


== Upgrade Notice ==

Just the usual, deactivate plugin, replace files, activate.

== Changelog ==

1.0 Added link and slogan color support.

<h4>Versions 1.0 </h4>

*   1.0 Initial Release


