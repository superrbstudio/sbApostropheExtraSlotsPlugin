<?php

class PluginsbCampaignMonitorSubscribeSlotComponents extends aSlotComponents 
{
	public function executeEditView()
  {
    // Must be at the start of both view components
    $this->setup();
    
    // Careful, don't clobber a form object provided to us with validation errors
    // from an earlier pass
    if (!isset($this->form))
    {
      $this->form = new sbCampaignMonitorSubscribeSlotEditForm($this->id, $this->slot->getArrayValue());
    }
  }
  public function executeNormalView()
  {
    $this->setup();
    $this->values = $this->slot->getArrayValue();
    
    if(isset($this->values['list_id']) and $this->values['list_id'] != '')
    {
	    $this->listId = $this->values['list_id'];
    }
    else
    {
	    $this->listId = false;
    }
  }
}