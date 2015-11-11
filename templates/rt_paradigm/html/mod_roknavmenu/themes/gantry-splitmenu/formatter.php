<?php
/**
* @version   $Id: formatter.php 15670 2013-11-15 17:25:07Z arifin $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2013 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
* Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 *
 */
class GantrySplitmenuFormatter extends AbstractJoomlaRokMenuFormatter {
	function format_subnode(&$node) {

        $child_type =$node->getParams()->get('splitmenu_children_type');
        if ($child_type == 'modules' || $child_type == 'modulepos') $node->addListItemClass('parent');

        if ($node->getId() == $this->current_node) $node->addListItemClass('last');
	}
}
