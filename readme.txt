=== MLSP Media Embed ===
Contributors: jkhoffman, fanalejr
Tags: MLSP, embed media, responsive media, responsive video
Requires at least: 2.8
Tested up to: 3.3.1
Stable tag: 1.0.1

Add MLSP media embed support to wordpress. Optional responsive media script that will resize all media embeds to fit any browser size


== Description ==

This plugin will add MyLeadSystemPRO media embed support to wordpress. With this installed, you simply need to just past the link of your media from MLSP right in to the editor and WordPress will embed it for you, be it video or audio. 

As an added bonus, for those with responsive themes, we add the option of activating a script that will resize your media on the fly based the the user's browser size. The standard way of doing this is with some simple CSS. However, our script takes it a step forward. We dynamically calculate the height and width of your embedded media, and the resize it accordingly. We found this necessary because at MLSP, we allow embed of audio, which have a rather small player, and video at multiple aspect ratios. Again, this is an optional addition, but it can be extremely helpful for those with responsive themes. This option can be found right in your WordPress media options page.


== Installation ==

1. Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress 
installation and then activate the Plugin from Plugins page. OR just use the upload plugin 
function provided by wordpress and upload the .zip file directly.

2. Activate the plugin through the 'Plugins' menu in WordPress.

3. Head over to your media options to activate the responsive media functionality (Helpful if you use a responsive theme)

* Check out tutorial video at http://www.mlmleadsystempro.com/wordpress-media-embed if you need help


== Changelog ==

= 1.0 =
* Fix padding issue with the responsive media script

== Upgrade Notice ==

= 1.0 =
Fix padding issue with the responsive media script. Upgrade if using script.


