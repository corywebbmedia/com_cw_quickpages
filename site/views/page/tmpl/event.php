<?php
/**
 * @copyright   Copyright (C) 2015-2016 Cory Webb Media, LLC. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * OVERRIDE INSTRUCTIONS: To override the layout of this file,
 * simply make a copy of this file at
 *
 *     /templates/{YOUR_TEMPLATE}/html/com_cw_quickpages/page/event.php
 *
 * Then edit the file as needed.
 */

// No direct access
defined('_JEXEC') or die;

$event = array();
$event['datetime']  = $this->params->get('event_datetime');
$event['image']     = $this->params->get('event_image');
$event['name']      = $this->params->get('event_name');
$event['email']     = $this->params->get('event_email');
$event['address']   = $this->params->get('event_address');
$event['city']      = $this->params->get('event_city');
$event['state']     = $this->params->get('event_state');
$event['zip']       = $this->params->get('event_zip');
$event['country']   = $this->params->get('event_country');
$event['phone']     = $this->params->get('event_phone');
$event['mobile']    = $this->params->get('event_mobile');
$event['fax']       = $this->params->get('event_fax');
$event['website']   = $this->params->get('event_website');
$event['map']       = $this->params->get('event_map');
$latitude           = $this->params->get('event_latitude');
$longitude          = $this->params->get('event_longitude');

if($event['map'] && $latitude && $longitude) {
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

<div class="page event">

    <?php if($this->title) : ?>
    <h1 class="page-title"><?php echo $this->title; ?></h1><!-- /.page-title -->
    <?php endif; ?>

    <div class="row-fluid">

        <div class="span3">
            <?php if($event['image']): ?>
            <div class="page-image event-image">
                <img src="<?php echo JURI::base() . $event['image']; ?>" alt="<?php echo ($event['name'] ? htmlspecialchars($event['name']) : htmlspecialchars($this->title)); ?>" />
            </div>
            <?php endif; ?>

            <?php if($event['name']): ?>
            <h3><?php echo $event['name']; ?></h3>
            <?php endif; ?>

            <?php if($event['datetime']): ?>
            <p class="event-datetime"><?php echo JHtml::_('date', $event['datetime'], JText::_('DATE_FORMAT_LC3')); ?></p>
            <?php endif; ?>

            <dl class="event-meta">
            <?php if($event['address'] || $event['city'] || $event['state'] || $event['zip']): ?>
                <dt class="event-location"><?php echo JText::_('COM_CW_QUICKPAGES_LOCATION'); ?></dt>
                <dd class="event-location">

                    <?php if($event['address']): ?>
                        <?php echo $event['address'];?><br />
                    <?php endif; ?>

                    <?php if($event['city'] && $event['state']): ?>
                        <?php echo $event['city']; ?>, <?php echo $event['state']; ?>
                    <?php elseif($event['city']): ?>
                        <?php echo $event['city']; ?>
                    <?php elseif($event['state']): ?>
                        <?php echo $event['state']; ?>
                    <?php endif; ?>

                    <?php if($event['zip']): ?>
                        <?php echo $event['zip']; ?>
                    <?php endif; ?>

                    <?php if($event['country']): ?>
                        <br /><?php echo $event['country']; ?>
                    <?php endif; ?>

                </dd>
            <?php endif; ?>

            <?php if($event['phone']): ?>
                <dt class="event-phone"><?php echo JText::_('COM_CW_QUICKPAGES_PHONE'); ?></dt>
                <dd class="event-phone">
                    <?php echo $event['phone']; ?>
                </dd>
            <?php endif; ?>

            <?php if($event['mobile']): ?>
                <dt class="event-mobile"><?php echo JText::_('COM_CW_QUICKPAGES_MOBILE'); ?></dt>
                <dd class="event-mobile">
                    <?php echo $event['mobile']; ?>
                </dd>
            <?php endif; ?>

            <?php if($event['fax']): ?>
                <dt class="event-fax"><?php echo JText::_('COM_CW_QUICKPAGES_FAX'); ?></dt>
                <dd class="event-fax">
                    <?php echo $event['fax']; ?>
                </dd>
            <?php endif; ?>

            <?php if($event['email']): ?>
                <dt class="event-email"><?php echo JText::_('COM_CW_QUICKPAGES_EMAIL'); ?></dt>
                <dd class="event-email">
                    <a href="mailto:<?php echo $event['email']; ?>"><?php echo JText::_('COM_CW_QUICKPAGES_EMAIL'); ?></a>
                </dd>
            <?php endif; ?>

            <?php if($event['website']): ?>
                <dt class="event-website"><?php echo JText::_('COM_CW_QUICKPAGES_WEBSITE'); ?></dt>
                <dd class="event-website">
                    <a href="<?php echo $event['website']; ?>"><?php echo JText::_('COM_CW_QUICKPAGES_WEBSITE'); ?></a>
                </dd>
            <?php endif; ?>
            </dl><!-- /.event-meta -->

        </div><!-- /.span3 -->

        <div class="span9">

            <div class="page-content">
                <?php echo $this->content; ?>
            </div><!-- /.page-content -->

            <?php if($event['map'] && $latitude && $longitude): ?>
            <div class="page-map event-map">
                <div id="map"></div>
            </div>
            <?php endif; ?>

        </div><!-- /.span9 -->

    </div><!-- /.row-fluid -->

</div><!-- /.page -->