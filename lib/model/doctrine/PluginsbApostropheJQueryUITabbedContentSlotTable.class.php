<?php

/**
 * PluginsbApostropheJQueryUITabbedContentSlotTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginsbApostropheJQueryUITabbedContentSlotTable extends aSlotTable
{
	/**
		* Returns an instance of this class.
		*
		* @return object PluginsbApostropheJQueryUITabbedContentSlotTable
		*/
	public static function getInstance()
	{
			return Doctrine_Core::getTable('PluginsbApostropheJQueryUITabbedContentSlot');
	}
	
	public static function getSlotVirtualPage()
	{
		
	}
	
	public static function createVirtualPageSlug($pageId, $permId)
	{
		return 'sb-apostrophe-jquery-ui-tabbed-' . $pageId . '-' . $permId;
	}
}