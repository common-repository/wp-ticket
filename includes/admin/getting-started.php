<?php
/**
 * Getting Started
 *
 * @package WP_TICKET_COM
 * @since WPAS 5.3
 */
if (!defined('ABSPATH')) exit;
add_action('wp_ticket_com_getting_started', 'wp_ticket_com_getting_started');
/**
 * Display getting started information
 * @since WPAS 5.3
 *
 * @return html
 */
function wp_ticket_com_getting_started() {
	global $title;
	list($display_version) = explode('-', WP_TICKET_COM_VERSION);
?>
<style>
.about-wrap img{
max-height: 200px;
}
div.comp-feature {
    font-weight: 400;
    font-size:20px;
}
.edition-com {
    display: none;
}
.green{
color: #008000;
font-size: 30px;
}
#nav-compare:before{
    content: "\f179";
}
#emd-about .nav-tab-wrapper a:before{
    position: relative;
    box-sizing: content-box;
padding: 0px 3px;
color: #4682b4;
    width: 20px;
    height: 20px;
    overflow: hidden;
    white-space: nowrap;
    font-size: 20px;
    line-height: 1;
    cursor: pointer;
font-family: dashicons;
}
#nav-getting-started:before{
content: "\f102";
}
#nav-release-notes:before{
content: "\f348";
}
#nav-resources:before{
content: "\f118";
}
#nav-features:before{
content: "\f339";
}
#emd-about .embed-container { 
	position: relative; 
	padding-bottom: 56.25%;
	height: 0;
	overflow: hidden;
	max-width: 100%;
	height: auto;
	} 

#emd-about .embed-container iframe,
#emd-about .embed-container object,
#emd-about .embed-container embed { 
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	}
#emd-about ul li:before{
    content: "\f522";
    font-family: dashicons;
    font-size:25px;
 }
#gallery {
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
#gallery .gallery-item {
	margin-top: 10px;
	margin-right: 10px;
	text-align: center;
        cursor:pointer;
}
#gallery img {
	border: 2px solid #cfcfcf; 
height: 405px; 
width: auto; 
}
#gallery .gallery-caption {
	margin-left: 0;
}
#emd-about .top{
text-decoration:none;
}
#emd-about .toc{
    background-color: #fff;
    padding: 25px;
    border: 1px solid #add8e6;
    border-radius: 8px;
}
#emd-about h3,
#emd-about h2{
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0.6em;
    margin-left: 0px;
}
#emd-about p,
#emd-about .emd-section li{
font-size:18px
}
#emd-about a.top:after{
content: "\f342";
    font-family: dashicons;
    font-size:25px;
text-decoration:none;
}
#emd-about .toc a,
#emd-about a.top{
vertical-align: top;
}
#emd-about li{
list-style-type: none;
line-height: normal;
}
#emd-about ol li {
    list-style-type: decimal;
}
#emd-about .quote{
    background: #fff;
    border-left: 4px solid #088cf9;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    margin-top: 25px;
    padding: 1px 12px;
}
#emd-about .tooltip{
    display: inline;
    position: relative;
}
#emd-about .tooltip:hover:after{
    background: #333;
    background: rgba(0,0,0,.8);
    border-radius: 5px;
    bottom: 26px;
    color: #fff;
    content: 'Click to enlarge';
    left: 20%;
    padding: 5px 15px;
    position: absolute;
    z-index: 98;
    width: 220px;
}
</style>

<?php add_thickbox(); ?>
<div id="emd-about" class="wrap about-wrap">
<div id="emd-header" style="padding:10px 0" class="wp-clearfix">
<div style="float:right"><img src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/wp_ticket_logo.gif"; ?>"></div>
<div style="margin: .2em 200px 0 0;padding: 0;color: #32373c;line-height: 1.2em;font-size: 2.8em;font-weight: 400;">
<?php printf(__('Welcome to WP Ticket Community %s', 'wp-ticket-com') , $display_version); ?>
</div>

<p class="about-text">
<?php printf(__("Let's get started with WP Ticket Starter edition", 'wp-ticket-com') , $display_version); ?>
</p>
<div style="display: inline-block;"><a style="height: 50px; background:#ff8484;padding:10px 12px;color:#ffffff;text-align: center;font-weight: bold;line-height: 50px; font-family: Arial;border-radius: 6px; text-decoration: none;" href="https://emdplugins.com/plugin-pricing/wp-ticket-wordpress-plugin-pricing/?pk_campaign=wp-ticket-com-upgradebtn&amp;pk_kwd=wp-ticket-com-resources"><?php printf(__('Upgrade Now', 'wp-ticket-com') , $display_version); ?></a></div>
<div style="display: inline-block;margin-bottom: 20px;"><a style="height: 50px; background:#f0ad4e;padding:10px 12px;color:#ffffff;text-align: center;font-weight: bold;line-height: 50px; font-family: Arial;border-radius: 6px; text-decoration: none;" href="https://wpticketcom.emdplugins.com//?pk_campaign=wp-ticket-com-buybtn&amp;pk_kwd=wp-ticket-com-resources"><?php printf(__('Visit Pro Demo Site', 'wp-ticket-com') , $display_version); ?></a></div>
<?php
	$tabs['getting-started'] = __('Getting Started', 'wp-ticket-com');
	$tabs['release-notes'] = __('Release Notes', 'wp-ticket-com');
	$tabs['resources'] = __('Resources', 'wp-ticket-com');
	$tabs['features'] = __('Features', 'wp-ticket-com');
	$active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'getting-started';
	echo '<h2 class="nav-tab-wrapper wp-clearfix">';
	foreach ($tabs as $ktab => $mytab) {
		$tab_url[$ktab] = esc_url(add_query_arg(array(
			'tab' => $ktab
		)));
		$active = "";
		if ($active_tab == $ktab) {
			$active = "nav-tab-active";
		}
		echo '<a href="' . esc_url($tab_url[$ktab]) . '" class="nav-tab ' . esc_attr($active) . '" id="nav-' . esc_attr($ktab) . '">' . esc_html($mytab) . '</a>';
	}
	echo '</h2>';
?>
<?php echo '<div class="tab-content" id="tab-getting-started"';
	if ("getting-started" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<div style="height:25px" id="rtop"></div><div class="toc"><h3 style="color:#0073AA;text-align:left;">Quickstart</h3><ul><li><a href="#gs-sec-1">Live Demo Site</a></li>
<li><a href="#gs-sec-3">Need Help?</a></li>
<li><a href="#gs-sec-4">Learn More</a></li>
<li><a href="#gs-sec-2">Installation, Configuration & Customization Service</a></li>
</ul></div><div class="quote">
<p class="about-description">The secret of getting ahead is getting started - Mark Twain</p>
</div>
<div id="gs-sec-1"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Live Demo Site</div><div class="changelog emd-section getting-started-1" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>Feel free to check out our <a target="_blank" href="https://wpticketcom.emdplugins.com//?pk_campaign=wp-ticket-com-gettingstarted&pk_kwd=wp-ticket-com-livedemo">live demo site</a> to learn how to use WP Ticket Community starter edition. The demo site will always have the latest version installed.</p>
<p>You can also use the demo site to identify possible issues. If the same issue exists in the demo site, open a support ticket and we will fix it. If a WP Ticket Community feature is not functioning or displayed correctly in your site but looks and works properly in the demo site, it means the theme or a third party plugin or one or more configuration parameters of your site is causing the issue.</p>
<p>If you'd like us to identify and fix the issues specific to your site, purchase a work order to get started.</p>
<p><a target="_blank" style="
    padding: 16px;
    background: coral;
    border: 1px solid lightgray;
    border-radius: 12px;
    text-decoration: none;
    color: white;
    margin: 10px 0;
    display: inline-block;" href="https://support.emdplugins.com/expert-service-pricing/?pk_campaign=wp-ticket-com-gettingstarted&pk_kwd=wp-ticket-com-livedemo">Purchase Work Order</a></p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-3"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Need Help?</div><div class="changelog emd-section getting-started-3" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>There are many resources available in case you need help:</p>
<ul>
<li>Search our <a target="_blank" href="https://support.emdplugins.com">knowledge base</a></li>
<li><a href="https://support.emdplugins.com/kb_tags/wp-ticket" target="_blank">Browse our WP Ticket Community articles</a></li>
<li><a href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation" target="_blank">Check out WP Ticket Community documentation for step by step instructions.</a></li>
<li><a href="https://support.emdplugins.com/emdplugins-support-introduction/" target="_blank">Open a support ticket if you still could not find the answer to your question</a></li>
</ul>
<p>Please read <a href="https://support.emdplugins.com/questions/what-to-write-on-a-support-ticket-related-to-a-technical-issue/" target="_blank">"What to write to report a technical issue"</a> before submitting a support ticket.</p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-4"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Learn More</div><div class="changelog emd-section getting-started-4" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>The following articles provide step by step instructions on various concepts covered in WP Ticket Community.</p>
<ul><li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article167">Concepts</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article467">Content Access</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article466">Quick Start</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article468">Working with Agents</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article169">Working with Tickets</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article170">Widgets</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article354">Standards</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article302">Integrations</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article171">Forms</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article229">Roles and Capabilities</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article301">Notifications</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article172">Administration</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article355">Creating Shortcodes</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article174">Screen Options</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article173">Localization(l10n)</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article469">Customizations</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation/#article175">Glossary</a>
</li></ul></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-2"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Installation, Configuration & Customization Service</div><div class="changelog emd-section getting-started-2" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>Get the peace of mind that comes from having WP Ticket Community properly installed, configured or customized by eMarket Design.</p>
<p>Being the developer of WP Ticket Community, we understand how to deliver the best value, mitigate risks and get the software ready for you to use quickly.</p>
<p>Our service includes:</p>
<ul>
<li>Professional installation by eMarket Design experts.</li>
<li>Configuration to meet your specific needs</li>
<li>Installation completed quickly and according to best practice</li>
<li>Knowledge of WP Ticket Community best practices transferred to your team</li>
</ul>
<p>Pricing of the service is based on the complexity of level of effort, required skills or expertise. To determine the estimated price and duration of this service, and for more information about related services, purchase a work order.  
<p><a target="_blank" style="
    padding: 16px;
    background: coral;
    border: 1px solid lightgray;
    border-radius: 12px;
    text-decoration: none;
    color: white;
    margin: 10px 0;
    display: inline-block;" href="https://support.emdplugins.com/expert-service-pricing/?pk_campaign=wp-ticket-com-gettingstarted&pk_kwd=wp-ticket-com-livedemo">Purchase Work Order</a></p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px">
<?php echo '</div>'; ?>
<?php echo '<div class="tab-content" id="tab-release-notes"';
	if ("release-notes" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<p class="about-description">This page lists the release notes from every production version of WP Ticket Community.</p>

<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.9.5 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1264" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Improved code quality by adding sanitization call for some functions.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1263" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
WordPress 5.6 compatibility</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.9.3 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1219" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Required field validation is not working.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.9.2 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1217" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
multi-select form component missing scroll bars when the content overflows its fixed height.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.9.1 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1158" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 5.5.1</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1157" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
updates to translation strings and libraries</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1156" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added version numbers to js and css files for caching purposes</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.9.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1118" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Emd Form Builder support for WP Ticket WooCommerce Extension</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1117" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Emd Form Builder support for WordPress stock themes</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.8.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1093" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added previous and next buttons for the edit screens of tickets and agents</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1092" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
updates and improvements to libraries</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1091" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added previous and next buttons for the edit screens of quotes</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1073" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
updates and improvements to form library</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.7.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1011" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Emd templates</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1010" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
updates and improvements to form library</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1009" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added support for Emd Custom Field Builder when upgraded to premium editions</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.6.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-961" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Session cleanup workflow by creating a custom table to process records.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-960" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added Emd form builder support.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-959" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
XSS related issues.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-958" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Cleaned up unnecessary code and optimized the library file content.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.5.1 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-898" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Misc updates for better compatibility and stability</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.5.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-856" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Emd templating system to match modern web standards</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-855" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Created a new shortcode page which displays all available shortcodes. You can access this page under the plugin settings.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.4.4 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-769" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Misc updates for better compatibility and stability</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.4.3 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-740" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
library updates for better stability and compatibility</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.4.2 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-665" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Moved web fonts to local storage - you can still get them from CDN using your functions.php if you need to.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.4.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-593" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Search results table when ticket priority is empty</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-592" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Ability to limit max size, max number of files and file types of ticket attachments and agent photos</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-591" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Ability to limit max size and file types of ticket attachments and agent photos</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-590" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
library updates</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.3.2 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-440" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
The audio issue in the introduction video</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-439" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Changed WPAS button in pages to VSB for Visual Shortcode Builder</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.3.1 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-433" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Layout of ticket page when priority is not shown.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.3.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-417" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Extended the session clean up time to 12 hours</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-416" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Improved Ticket List and Ticket Results table css</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-415" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Getting started section</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.2.2 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-414" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Getting started section</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.2.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-351" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Updated codemirror libraries for custom CSS and JS options in plugin settings page</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-350" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
PHP 7 compatibility</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-349" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added container type field in the plugin settings</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-348" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added custom JavaScript option in plugin settings under Tools tab</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.15.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1532" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
email sent when an agent is assigned to a ticket</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.14.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1519" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Translation to one textdomain</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1518" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 6.5</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.13 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1476" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
XSS issues in the WordPress admin area</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1475" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 6.2</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.12.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1449" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 6.0</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.11.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1447" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 5.9.3 and PHP 8</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">5.1.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-219" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added support for EMD Active Directory/LDAP Extension</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-218" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added support for EMD MailChimp extension</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-217" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
WP Sessions security vulnerability</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<?php echo '</div>'; ?>
<?php echo '<div class="tab-content" id="tab-resources"';
	if ("resources" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Extensive documentation is available</div><div class="emd-section changelog resources resources-154" style="margin:0;background-color:white;padding:10px"><div style="height:40px" id="gs-sec-154"></div><div id="gallery" class="wp-clearfix"></div><div class="sec-desc"><a href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation">WP Ticket Community Documentation</a></div></div><div style="margin-top:15px"><a href="#ptop" class="top">Go to top</a></div><hr style="margin-top:40px"><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">How to customize WP Ticket Community</div><div class="emd-section changelog resources resources-159" style="margin:0;background-color:white;padding:10px"><div style="height:40px" id="gs-sec-159"></div><div class="emd-yt" data-youtube-id="ktv564QBO4s" data-ratio="16:9">loading...</div><div class="sec-desc"><p><strong><span class="dashicons dashicons-arrow-up-alt"></span> Watch the customization video to familiarize yourself with the customization options. </strong>. The video shows one of our plugins as an example. The concepts are the same and all our plugins have the same settings.</p>
<p>WP Ticket Community is designed and developed using <a href="https://wpappstudio.com">WP App Studio (WPAS) Professional WordPress Development platform</a>. All WPAS plugins come with extensive customization options from plugin settings without changing theme template files. Some of the customization options are listed below:</p>
<ul>
	<li>Enable or disable all fields, taxonomies and relationships from backend and/or frontend</li>
        <li>Use the default EMD or theme templating system</li>
	<li>Set slug of any entity and/or archive base slug</li>
	<li>Set the page template of any entity, taxonomy and/or archive page to sidebar on left, sidebar on right or no sidebar (full width)</li>
	<li>Hide the previous and next post links on the frontend for single posts</li>
	<li>Hide the page navigation links on the frontend for archive posts</li>
	<li>Display or hide any custom field</li>
	<li>Display any sidebar widget on plugin pages using EMD Widget Area</li>
	<li>Set custom CSS rules for all plugin pages including plugin shortcodes</li>
</ul>
<div class="quote">
<p>If your customization needs are more complex, you’re unfamiliar with code/templates and resolving potential conflicts, we strongly suggest you to <a href="https://emdplugins.com/open-a-support-ticket/?pk_campaign=wp-ticket-com-hireme-custom&ticket_topic=pre-sales-questions">hire us</a>, we will get your site up and running in no time.
</p>
</div></div></div><div style="margin-top:15px"><a href="#ptop" class="top">Go to top</a></div><hr style="margin-top:40px"><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">How to resolve theme related issues</div><div class="emd-section changelog resources resources-158" style="margin:0;background-color:white;padding:10px"><div style="height:40px" id="gs-sec-158"></div><div id="gallery" class="wp-clearfix"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-158" href="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/emd_templating_system.png"; ?>"><img src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/emd_templating_system.png"; ?>"></a></div></div><div class="sec-desc"><p>If your theme is not coded based on WordPress theme coding standards, does have an unorthodox markup or its style.css is messing up how WP Ticket Community pages look and feel, you will see some unusual changes on your site such as sidebars not getting displayed where they are supposed to or random text getting displayed on headers etc. after plugin activation.</p>
<p>The good news is WP Ticket Community plugin is designed to minimize theme related issues by providing two distinct templating systems:</p>
<ul>
<li>The EMD templating system is the default templating system where the plugin uses its own templates for plugin pages.</li>
<li>The theme templating system where WP Ticket Community uses theme templates for plugin pages.</li>
</ul>
<p>The EMD templating system is the recommended option. If the EMD templating system does not work for you, you need to check "Disable EMD Templating System" option at Settings > Tools tab and switch to theme based templating system.</p>
<p>Please keep in mind that when you disable EMD templating system, you loose the flexibility of modifying plugin pages without changing theme template files.</p>
<p>If none of the provided options works for you, you may still fix theme related conflicts following the steps in <a href="https://docs.emdplugins.com/docs/wp-ticket-community-documentation">WP Ticket Community Documentation - Resolving theme related conflicts section.</a></p>

<div class="quote">
<p>If you’re unfamiliar with code/templates and resolving potential conflicts, <a href="https://emdplugins.com/open-a-support-ticket/?pk_campaign=raq-hireme&ticket_topic=pre-sales-questions"> do yourself a favor and hire us</a>. Sometimes the cost of hiring someone else to fix things is far less than doing it yourself. We will get your site up and running in no time.</p>
</div></div></div><div style="margin-top:15px"><a href="#ptop" class="top">Go to top</a></div><hr style="margin-top:40px">
<?php echo '</div>'; ?>
<?php echo '<div class="tab-content" id="tab-features"';
	if ("features" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<h3>Download Now & Deliver Stellar Customer Support! (Free)</h3>
<p>Explore the full list of features available in the the latest version of WP Ticket. Click on a feature title to learn more.</p>
<table class="widefat features striped form-table" style="width:auto;font-size:16px">
<tr><td><a href="https://emdplugins.com/wp-ticket-unleashes-revenue-generation-with-customer-support-plans?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/money.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-unleashes-revenue-generation-with-customer-support-plans?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Monetize Support with Support Plans</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-unveils-individual-dashboards-for-superior-support?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/support-agents.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-unveils-individual-dashboards-for-superior-support?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Empower Your Support Team</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-safeguards-your-support-ticket-form-with-honeypot-and-re-captcha?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/no-spam.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-safeguards-your-support-ticket-form-with-honeypot-and-re-captcha?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Combat Spam Effectively</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-facilitates-seamless-attachment-sharing-for-support-tickets?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/attachment.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-facilitates-seamless-attachment-sharing-for-support-tickets?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Enhanced Communication</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-consistent-interface-across-all-devices?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/responsive.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-consistent-interface-across-all-devices?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Seamless Support Anywhere, Anytime</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-customize-your-ticket-forms?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/customize.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-customize-your-ticket-forms?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Create a seamless support experience that enhances customer satisfaction</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-customer-support-client-area?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/client-area.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-customer-support-client-area?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Empower Users: Elevate User Engagement with WP Ticket</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-role-based-helpdesk-access-control?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/key.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-role-based-helpdesk-access-control?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Role Based Helpdesk Access Control</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-shared-helpdesk-ticket-inbox?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/central-location.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-shared-helpdesk-ticket-inbox?pk_campaign=wp-ticket-com&pk_kwd=getting-started">WP Ticket's Shared Team Inbox Empowers Helpdesk Agents</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-frontend-support-ticket-and-agent-profile-editing?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/frontend_edit.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-frontend-support-ticket-and-agent-profile-editing?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Enhance overall system adoption and productivity.</a></td><td> - Premium feature (Included in Enterprise only)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-empowers-field-level-permissions-for-controlled-helpdesk-access?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/attribute-access.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-empowers-field-level-permissions-for-controlled-helpdesk-access?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Secure helpdesk system by allowing you to control access rights</a></td><td> - Premium feature (Included in Enterprise only)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-facilitates-team-based-resolution-for-faster-ticket-resolution?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/contributors.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-facilitates-team-based-resolution-for-faster-ticket-resolution?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Promote collaboration among staff</a></td><td> - Premium feature (included in both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-time-based-customer-support-automation?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/automation.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-time-based-customer-support-automation?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Streamline support processes and reduce manual intervention</a></td><td> - Premium feature (Included in Enterprise only)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-event-based-workflows-automate-customer-support-tasks?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/triggers.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-event-based-workflows-automate-customer-support-tasks?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Free up time for higher-priority tasks</a></td><td> - Premium feature (Included in Enterprise only)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-flexible-organization-of-support-staff-across-multiple-departments?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/agent_departments.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-flexible-organization-of-support-staff-across-multiple-departments?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Effective organization of support staff into distinct departments.</a></td><td> - Premium feature (included in both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-get-more-work-out-of-your-agents?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/empower-users.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-get-more-work-out-of-your-agents?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Enhance Support Agent Capabilities with Easy Customization</a></td><td> - Premium feature (included in both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-streamlines-support-by-linking-similar-tickets-for-efficient-resolution?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/rgb.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-streamlines-support-by-linking-similar-tickets-for-efficient-resolution?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Enhance Support Efficiency</a></td><td> - Premium feature (Included in Enterprise only)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-enhance-customer-insights-with-custom-fields?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/custom-fields.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-enhance-customer-insights-with-custom-fields?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Integrate custom fields within WP Ticket</a></td><td> - Premium feature (included in both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-unleash-the-potential-of-custom-helpdesk-reports?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/custom-report.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-unleash-the-potential-of-custom-helpdesk-reports?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Create Custom Helpdesk Reports with WP Ticket WordPress Plugin</a></td><td> - Premium feature (Included in both Pro and Enterprise. Enterprise has more powerful features.)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-arrange-actions-based-on-urgency-and-importance?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/todo.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-arrange-actions-based-on-urgency-and-importance?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Arrange actions based on urgency and importance</a></td><td> - Premium feature (Included in Enterprise only)</td></tr>
<tr><td><a href="https://emdplugins.com/expedite-customer-support-with-quick-searches?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/clipboard.png"; ?>"></a></td><td><a href="https://emdplugins.com/expedite-customer-support-with-quick-searches?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Expedite customer support with quick searches</a></td><td> - Premium feature (included in both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/effortlessly-pinpoint-issues-rapid-real-time-overview-of-essential-helpdesk-metrics?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/easel.png"; ?>"></a></td><td><a href="https://emdplugins.com/effortlessly-pinpoint-issues-rapid-real-time-overview-of-essential-helpdesk-metrics?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Get a quick, real-time summary of the most important helpdesk metrics </a></td><td> - Premium feature (Included in both Pro and Enterprise. Enterprise has more powerful features.)</td></tr>
<tr><td><a href="https://emdplugins.com/track-agent-performance-through-integrated-dashboard-in-wp-ticket?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/dashboard.png"; ?>"></a></td><td><a href="https://emdplugins.com/track-agent-performance-through-integrated-dashboard-in-wp-ticket?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Monitor Agent Performance via Integrated Dashboard in WP Ticket</a></td><td> - Premium feature (Included in Enterprise only)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-ensure-accurate-and-up-to-date-information-in-all-platforms?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/integrators.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-ensure-accurate-and-up-to-date-information-in-all-platforms?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Save time and resources by eliminating manual data entry and updates</a></td><td> - Add-on</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-mailchimp-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/mailchimp.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-mailchimp-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Seamlessly integrate support processes with their email marketing strategy</a></td><td> - Add-on</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-microsoft-active-directory-ldap-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/active-directory.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-microsoft-active-directory-ldap-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Automate updates and ensure consistent team data</a></td><td> - Add-on</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-smart-search-and-columns-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/zoomin.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-smart-search-and-columns-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Combine multiple criteria for targeted information retrieval</a></td><td> - Add-on (included both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-import-export-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/csv-impexp.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-import-export-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Simplify migration from other customer support systems</a></td><td> - Add-on (included both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-easy-digital-downloads-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/eddcom.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-easy-digital-downloads-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Connect customer orders and products with support tickets</a></td><td> - Add-on</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-woocommerce-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/woocom.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-woocommerce-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Wp Ticket Woocommerce Addon</a></td><td> - Add-on</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-canned-responses-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/canned-responses.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-canned-responses-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started"> Elevate overall efficiency with WP Ticket's Canned Responses Addon</a></td><td> - Add-on (Included in Enterprise only)</td></tr>
<tr><td><a href="https://emdplugins.com/wp-ticket-incoming-email-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo WP_TICKET_COM_PLUGIN_URL . "assets/img/email.png"; ?>"></a></td><td><a href="https://emdplugins.com/wp-ticket-incoming-email-addon?pk_campaign=wp-ticket-com&pk_kwd=getting-started">Clutter-free and streamlined customer support experience</a></td><td> - Add-on (Included in Enterprise only)</td></tr>
</table>
<?php echo '</div>'; ?>
<?php echo '</div>';
}