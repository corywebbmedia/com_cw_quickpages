<?php
/**
 * @copyright   Copyright (C) 2015-2016 Cory Webb Media, LLC. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_cw_quickpages/assets/css/cw_quickpages.css');
?>

<div class="row-fluid">

    <div class="span9 offset1 pull-right">

        <h2>Welcome to CW Quick Pages!</h2>

        <p>CW Quick Pages is the quickest way to add a page in Joomla.</p>

        <p><a href="#basic">Basic Instructions</a> | <a href="#intermediate">Intermediate Instructions</a> | <a href="#advanced">Advanced Instructions</a></p>

        <hr />

        <h3 id="basic">Basic Instructions</h3>

        <h4>Creating a Standard Content Page</h4>

        <ol>
        	<li>Open a menu in the menu manager.</li>
        	<li>Click the New button to add a menu item.</li>
        	<li>Set the menu item type to CW Quick Pages > Page</li>
            <li>In the menu item's CW Quick Pages tab, enter the page title and page content.</li>
            <li>Save the menu item.</li>
        </ol>

        <h4>Creating a Contact Page</h4>

        <ol>
            <li>Open a menu in the menu manager.</li>
            <li>Click the New button to add a menu item.</li>
            <li>Set the menu item type to CW Quick Pages > Contact</li>
            <li>In the menu item's CW Quick Pages tab, enter the page title and page content.</li>
            <li>In the menu item's Contact Info tab, enter the contact information to be displayed. <a href="#footnote">*</a></li>
            <li>Save the menu item.</li>
        </ol>

        <h4>Creating an Event Page</h4>

        <ol>
            <li>Open a menu in the menu manager.</li>
            <li>Click the New button to add a menu item.</li>
            <li>Set the menu item type to CW Quick Pages > Event</li>
            <li>In the menu item's CW Quick Pages tab, enter the page title and page content.</li>
            <li>In the menu item's Event Info tab, enter the event information to be displayed. <a href="#footnote">*</a></li>
            <li>Save the menu item.</li>
        </ol>

        <hr />

        <h3 id="intermediate">Intermediate Instructions</h3>

        <h4>Overriding the Layout of a Standard Content Page</h4>

        <ol>
            <li>Copy <code>/components/com_cw_quickpages/views/page/tmpl/default.php</code> to <code>/templates/{YOUR_TEMPLATE}/html/com_cw_quickpages/page/default.php</code></li>
            <li>Modify as needed.</li>
        </ol>

        <h4>Adding Multiple Layouts for Standard Content Pages</h4>

        <ol>
            <li>Copy <code>/components/com_cw_quickpages/views/page/tmpl/default.php</code> to <code>/templates/{YOUR_TEMPLATE}/html/com_cw_quickpages/page/default.php</code></li>
            <li>Rename the file to something other than <code>default.php</code>. (Example: <code>newlayout.php</code>)</li>
            <li>Modify as needed.</li>
            <li>Repeat as needed with different layout names.</li>
            <li>When adding a new standard content page, in the CW Quick Pages tab of the menu item, select the layout you wish to use.</li>
        </ol>

        <hr />

        <h4>Overriding the Layout of a Contact Page</h4>

        <ol>
            <li>Copy <code>/components/com_cw_quickpages/views/page/tmpl/contact.php</code> to <code>/templates/{YOUR_TEMPLATE}/html/com_cw_quickpages/page/contact.php</code></li>
            <li>Modify as needed.</li>
        </ol>

        <h4>Adding Multiple Layouts for Contact Pages</h4>

        <ol>
            <li>Copy <code>/components/com_cw_quickpages/views/page/tmpl/contact.php</code> to <code>/templates/{YOUR_TEMPLATE}/html/com_cw_quickpages/page/contact.php</code></li>
            <li>Rename the file to something other than <code>contact.php</code>. (Example: <code>newcontactlayout.php</code>)</li>
            <li>Modify as needed.</li>
            <li>Repeat as needed with different layout names.</li>
            <li>When adding a new contact page, in the CW Quick Pages tab of the menu item, select the layout you wish to use.</li>
        </ol>

        <hr />

        <h4>Overriding the Layout of an Event Page</h4>

        <ol>
            <li>Copy <code>/components/com_cw_quickpages/views/page/tmpl/contact.php</code> to <code>/templates/{YOUR_TEMPLATE}/html/com_cw_quickpages/page/contact.php</code></li>
            <li>Modify as needed.</li>
        </ol>

        <h4>Adding Multiple Layouts for Event Pages</h4>

        <ol>
            <li>Copy <code>/components/com_cw_quickpages/views/page/tmpl/event.php</code> to <code>/templates/{YOUR_TEMPLATE}/html/com_cw_quickpages/page/event.php</code></li>
            <li>Rename the file to something other than <code>event.php</code>. (Example: <code>neweventlayout.php</code>)</li>
            <li>Modify as needed.</li>
            <li>Repeat as needed with different layout names.</li>
            <li>When adding a new event page, in the CW Quick Pages tab of the menu item, select the layout you wish to use.</li>
        </ol>

        <hr />

        <h3 id="advanced">Advanced Instructions</h3>

        <h4>Creating Your Own CW Quick Pages Menu Item Type</h4>

        <p><strong>This requires at least a basic understanding of Joomla! MVC architecture.</strong></p>
        <p>The quickest way to do this is to use the Contact menu item type as an example. Notice that in <code>/components/com_cw_quickpages/views/page/tmpl</code> there are 2 files for the contact layout: <code>contact.php</code> and <code>contact.xml</code>.</p>
        <p>The file <code>contact.php</code> defines the layout of the page, while <code>contact.xml</code> defines the menu item type as well as the parameters to be used in the menu item.</p>

        <ol>
            <li>Copy <code>/components/com_cw_quickpages/views/page/tmpl/contact.php</code> to <code>/templates/{YOUR_TEMPLATE}/html/com_cw_quickpages/page/contact.php</code></li>
            <li>Copy <code>/components/com_cw_quickpages/views/page/tmpl/contact.xml</code> to <code>/templates/{YOUR_TEMPLATE}/html/com_cw_quickpages/page/contact.xml</code></li>
            <li>Rename <code>contact.php</code> and <code>contact.xml</code> in your template to some other name, making sure that everything but the file extension is the same. (Example: <code>newtype.php</code> and <code>newtype.xml</code>)</li>
            <li>Mofiy the new PHP file and XML file as needed.</li>
            <li><a href="https://docs.joomla.org/J3.x:Developing_an_MVC_Component/Adding_a_variable_request_in_the_menu_type" target="_blank">Click here for more more information on adding parameters (fields) in the XML file.</a></li>
        </ol>

        <hr />

        <p id="footnote"><em>* Note: To display a map, you must enter the latitude/longited coordinates. These can be obtained at <a href="http://www.latlong.net/" target="_blank">http://www.latlong.net/</a>.</em></p>

    </div>

    <div class="span2 cwm-logo">
        <p><a href="http://corywebbmedia.com/joomla-extensions/cw-quick-pages"><img src="components/com_cw_quickpages/assets/images/logo-quick-pages.png" alt="CW Quick Pages" /></a></p>
        <h3><a href="http://corywebbmedia.com/joomla-extensions/cw-quick-pages">CW Quick Pages</a></h3>
    </div>

</div>

<hr />

<div class="cwm-logo">
    <p><a href="http://corywebbmedia.com"><img src="components/com_cw_quickpages/assets/images/logo_yellow_square.jpg" alt="Cory Webb Media" /></a></p>

    <p>Copyright &copy; 2015, <a href="http://corywebbmedia.com">Cory Webb Media, LLC</a></p>
</div>
