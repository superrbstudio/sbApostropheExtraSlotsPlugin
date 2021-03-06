<?php

/**
 * Description of PluginsbMicrodataPostalAddressComponents
 *
 * @author Giles Smith <tech@superrb.com>
 */
class PluginsbMicrodataPostalAddressComponents extends aSlotComponents
{
	public function executeEditView()
  {
    // Must be at the start of both view components
    $this->setup();
    
    // Careful, don't clobber a form object provided to us with validation errors
    // from an earlier pass
    if (!isset($this->form))
    {
      $this->form = new sbMicrodataPostalAddressSlotEditForm($this->id, $this->slot->getArrayValue());
    }
  }
  public function executeNormalView()
  {
    $this->setup();
    $this->values = $this->slot->getArrayValue();
  }
}