<?php

/**
 * Description of PluginsbVideoWithImageSlotActions
 *
 * @author pureroon
 */
class PluginsbVideoWithImageSlotActions extends BaseaVideoSlotActions 
{
  public function executeVideo(sfRequest $request)
  {
    if ($request->getParameter('aMediaCancel'))
    {
      return $this->redirectToPage();
    }
    
    $this->logMessage("====== in aButtonSlotActions::executeImage", "info");
    $this->editSetup();
    $item = Doctrine::getTable('aMediaItem')->find($request->getParameter('aMediaId'));
    
    if ($item && ($item->type === 'video'))
    {
      $links[] = intval($item->id);
      
      // remove current
      if($this->slot->MediaItems)
      {
        foreach($this->slot->MediaItems as $olditem)
        {
          if($olditem->type != 'video')
          {
            $links[] = intval($olditem->id);
          }
        }
      }
      
      $this->slot->unlink('MediaItems');
      $this->slot->link('MediaItems', $links);
    }
    
    return $this->editSave();
  }
  
  public function executeImage(sfRequest $request)
  {
    if ($request->getParameter('aMediaCancel'))
    {
      return $this->redirectToPage();
    }
    
    $this->logMessage("====== in aButtonSlotActions::executeImage", "info");
    $this->editSetup();
    $item = Doctrine::getTable('aMediaItem')->find($request->getParameter('aMediaId'));
    
    if ($item && ($item->type === 'image'))
    {
      $links[] = $item->id;
      
      // remove current
      if($this->slot->MediaItems)
      {
        foreach($this->slot->MediaItems as $olditem)
        {
          if($olditem->type != 'image')
          {
            $links[] = $olditem->id;
          }
        }
      }
      
      $this->slot->unlink('MediaItems');
      $this->slot->link('MediaItems', $links);
    }
    
    return $this->editSave();
  }
}