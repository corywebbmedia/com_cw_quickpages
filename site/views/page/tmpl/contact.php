<?php
/**
 * @copyright   Copyright (C) 2015-2016 Cory Webb Media, LLC. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * OVERRIDE INSTRUCTIONS: To override the layout of this file,
 * simply make a copy of this file at
 *
 *     /templates/{YOUR_TEMPLATE}/html/com_cw_quickpages/page/contact.php
 *
 * Then edit the file as needed.
 */

// No direct access
defined('_JEXEC') or die;

$contact = array();
$contact['image']   = $this->params->get('contact_image');
$contact['name']    = $this->params->get('contact_name');
$contact['email']   = $this->params->get('contact_email');
$contact['address'] = $this->params->get('contact_address');
$contact['city']    = $this->params->get('contact_city');
$contact['state']   = $this->params->get('contact_state');
$contact['zip']     = $this->params->get('contact_zip');
$contact['country'] = $this->params->get('contact_country');
$contact['phone']   = $this->params->get('contact_phone');
$contact['mobile']  = $this->params->get('contact_mobile');
$contact['fax']     = $this->params->get('contact_fax');
$contact['website'] = $this->params->get('contact_website');
$contact['map']     = $this->params->get('contact_map');
$latitude           = $this->params->get('contact_latitude');
$longitude          = $this->params->get('contact_longitude');

if($contact['map'] && $latitude && $longitude) {
    $style = '#map { width: 100%; height: 400px; background-color: #ccc; }';
    $map_api = 'https://maps.googleapis.com/maps/api/js';
    $script = <<< EOD
    function initialize_map() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng($latitude, $longitude),
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng($latitude, $longitude),
            map: map
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize_map);
EOD;

    $document = JFactory::getDocument();
    $document->addScript($map_api);
    $document->addScriptDeclaration($script);
    $document->addStyleDeclaration($style);
}

?>

<div class="page">

    <?php if($this->title) : ?>
    <h1 class="page-title"><?php echo $this->title; ?></h1><!-- /.page-title -->
    <?php endif; ?>

    <div class="row-fluid">

        <div class="span3">
            <?php if($contact['image']): ?>
            <div class="page-image contact-image">
                <img src="<?php echo JURI::base() . $contact['image']; ?>" alt="<?php echo ($contact['name'] ? htmlspecialchars($contact['name']) : htmlspecialchars($this->title)); ?>" />
            </div>
            <?php endif; ?>

            <?php if($contact['name']): ?>
            <h3><?php echo $contact['name']; ?></h3>
            <?php endif; ?>

            <dl class="contact-meta">
            <?php if($contact['email']): ?>
                <dt class="contact-email"><?php echo JText::_('COM_CW_QUICKPAGES_EMAIL'); ?></dt>
                <dd class="contact-email">
                    <a href="mailto:<?php echo $contact['email']; ?>"><?php echo JText::_('COM_CW_QUICKPAGES_EMAIL'); ?></a>
                </dd>
            <?php endif; ?>
            <?php if($contact['address'] || $contact['city'] || $contact['state'] || $contact['zip']): ?>
                <dt class="contact-location"><?php echo JText::_('COM_CW_QUICKPAGES_ADDRESS'); ?></dt>
                <dd class="contact-location">

                    <?php if($contact['address']): ?>
                        <?php echo $contact['address'];?><br />
                    <?php endif; ?>

                    <?php if($contact['city'] && $contact['state']): ?>
                        <?php echo $contact['city']; ?>, <?php echo $contact['state']; ?>
                    <?php elseif($contact['city']): ?>
                        <?php echo $contact['city']; ?>
                    <?php elseif($contact['state']): ?>
                        <?php echo $contact['state']; ?>
                    <?php endif; ?>

                    <?php if($contact['zip']): ?>
                        <?php echo $contact['zip']; ?>
                    <?php endif; ?>

                    <?php if($contact['country']): ?>
                        <br /><?php echo $contact['country']; ?>
                    <?php endif; ?>

                </dd>
            <?php endif; ?>

            <?php if($contact['phone']): ?>
                <dt class="contact-phone"><?php echo JText::_('COM_CW_QUICKPAGES_PHONE'); ?></dt>
                <dd class="contact-phone">
                    <?php echo $contact['phone']; ?>
                </dd>
            <?php endif; ?>

            <?php if($contact['mobile']): ?>
                <dt class="contact-mobile"><?php echo JText::_('COM_CW_QUICKPAGES_MOBILE'); ?></dt>
                <dd class="contact-mobile">
                    <?php echo $contact['mobile']; ?>
                </dd>
            <?php endif; ?>

            <?php if($contact['fax']): ?>
                <dt class="contact-fax"><?php echo JText::_('COM_CW_QUICKPAGES_FAX'); ?></dt>
                <dd class="contact-fax">
                    <?php echo $contact['fax']; ?>
                </dd>
            <?php endif; ?>

            <?php if($contact['website']): ?>
                <dt class="contact-website"><?php echo JText::_('COM_CW_QUICKPAGES_WEBSITE'); ?></dt>
                <dd class="contact-website">
                    <a href="<?php echo $contact['website']; ?>"><?php echo JText::_('COM_CW_QUICKPAGES_WEBSITE'); ?></a>
                </dd>
            <?php endif; ?>
            </dl><!-- /.contact-meta -->

        </div><!-- /.span3 -->

        <div class="span9">

            <div class="page-content">
                <?php echo $this->content; ?>
            </div><!-- /.page-content -->

            <?php if($contact['map'] && $latitude && $longitude): ?>
            <div class="page-map contact-map">
                <div id="map"></div>
            </div>
            <?php endif; ?>

        </div><!-- /.span9 -->

    </div><!-- /.row-fluid -->

</div><!-- /.page -->