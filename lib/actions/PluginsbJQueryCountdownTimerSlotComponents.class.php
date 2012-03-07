<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PluginsbJQueryCountdownTimerSlotComponents
 *
 * @author pureroon
 */
class PluginsbJQueryCountdownTimerSlotComponents extends aSlotComponents
{
  public function executeEditView()
  {
    // Must be at the start of both view components
    $this->setup();
    
    // Careful, don't clobber a form object provided to us with validation errors
    // from an earlier pass
    if (!isset($this->form))
    {
      $this->form = new sbJQueryCountdownTimerSlotEditForm($this->id, $this->slot->getArrayValue());
    }
  }
  public function executeNormalView()
  {
    $this->setup();
    $this->values = $this->slot->getArrayValue();
    
    $this->date   = null;
    
    if(isset($this->values['countdown_to_date']) and isset($this->values['countdown_to_time']))
    {
      $this->date = strtotime($this->values['countdown_to_date'] . " " . $this->values['countdown_to_time']);
    }
    
    // check the date hasn't passed
  }
}