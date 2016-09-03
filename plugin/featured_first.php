<?php
/**
 * @package     featured_first
 *
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * FeaturedFirst
 * Put the featured articles first in category listing
 * 
 * For now it's a very hacky product. May improve in the future.
 *
 * @since  3.5
 */
class plgSystemFeatured_first extends JPlugin
{

    /**
     * Use user state to display featured articles first in categories
     **/
    public function onAfterRoute()
    {
        $app = JFactory::getApplication();
        // not for admin side
        if ($app->isAdmin()) return;

        $input = $app->input;
        // if we are displaying a category
        if ($input->get('view') == 'category' && $input->get('option')  == 'com_content') {
            // use user state to set a sort preference using featured column
            $itemid = $app->input->get('id', 0, 'int') . ':' . $app->input->get('Itemid', 0, 'int');
            $app->setUserState('com_content.category.list.' . $itemid . '.filter_order', 'a.featured');
            $app->setUserState('com_content.category.list.' . $itemid . '.filter_order_Dir', 'DESC');            
        }
    }
}
