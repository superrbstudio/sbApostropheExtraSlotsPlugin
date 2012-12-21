<?php

/**
 * Description of PluginsbCampaignMonitorSubscribeSlotEditForm
 *
 * @author giles
 */
class PluginsbCampaignMonitorSubscribeSlotEditForm extends BaseForm 
{
  // Ensures unique IDs throughout the page
  protected $id;
  public function __construct($id, $defaults = array(), $options = array(), $CSRFSecret = null)
  {
    $this->id = $id;
    parent::__construct($defaults, $options, $CSRFSecret);
  }
  public function configure()
  {
    // ADD YOUR FIELDS HERE
    $this->setWidget('list_id', new sfWidgetFormInputText());
    $this->setValidator('list_id', new sfValidatorString());
    
    // Ensures unique IDs throughout the page. Hyphen between slot and form to please our CSS
    $this->widgetSchema->setNameFormat('slot-form-' . $this->id . '[%s]');
    
    // You don't have to use our form formatter, but it makes things nice
    $this->widgetSchema->setFormFormatterName('aAdmin');
  }
}