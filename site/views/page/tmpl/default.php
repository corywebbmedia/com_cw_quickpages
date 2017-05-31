<?php
/**
 * @copyright   Copyright (C) 2015-2016 Cory Webb Media, LLC. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * OVERRIDE INSTRUCTIONS: To override the layout of this file,
 * simply make a copy of this file at
 *
 *     /templates/{YOUR_TEMPLATE}/html/com_cw_quickpages/page/default.php
 *
 * Then edit the file as needed.
 */

// No direct access
defined('_JEXEC') or die;
?>

<div class="page">

    <?php if($this->title) : ?>
    <h1 class="page-title"><?php echo $this->title; ?></h1><!-- /.page-title -->
    <?php endif; ?>

    <div class="page-content">
        <?php echo $this->content; ?>
    </div><!-- /.page-content -->

</div><!-- /.page -->