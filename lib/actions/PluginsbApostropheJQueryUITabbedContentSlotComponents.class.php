<?php

/**
 * Description of PluginsbApostropheJQueryUITabbedContentSlotComponents
 *
 * @author Giles Smith <tech@superrb.com>
 */
abstract class PluginsbApostropheJQueryUITabbedContentSlotComponents extends aSlotComponents
{
	public function executeEditView()
  {
    // Must be at the start of both view components
    $this->setup();
    
    // Careful, don't clobber a form object provided to us with validation errors
    // from an earlier pass
    if (!isset($this->form))
    {
      $this->form = new sbApostropheJQueryUITabbedContentSlotEditForm($this->id, $this->slot->getArrayValue());
    }
  }
  public function executeNormalView()
  {
    $this->setup();
    $this->values = $this->slot->getArrayValue();
  }
}

?>
