<?php

/**
 * Description of PluginsbJQueryUITabbedContentSlotEditForm
 *
 * @author Giles Smith <tech@superrb.com>
 */
abstract class PluginsbJQueryUITabbedContentSlotEditForm extends BaseForm
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
    //@TODO Make this more dynamic rather than a fixed number of fields, guess something js with handling for unexpected fields
		
		for($i = 1; $i <= sfConfig::get('app_sbJQueryUITabbedContent_max_tabs', 5); $i++)
		{
			$this->setWidget('title_' . $i, new sfWidgetFormInputText());
			$this->setValidator('title_' . $i, new sfValidatorString(array('required' => false)));
		}
    
    // Ensures unique IDs throughout the page. Hyphen between slot and form to please our CSS
    $this->widgetSchema->setNameFormat('slot-form-' . $this->id . '[%s]');
    
    // You don't have to use our form formatter, but it makes things nice
    $this->widgetSchema->setFormFormatterName('aAdmin');
  }
}