<?php

/**
 * Description of PluginsbApostropheFAQSlotEditForm
 *
 * @author pureroon
 */
class PluginsbApostropheFAQSlotEditForm extends BaseForm
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
    
    // A simple example: a slot with a single 'text' field with a maximum length of 100 characters
    $this->setWidget('question', new sfWidgetFormInputText());
    $this->setValidator('question', new sfValidatorString(array('required' => false, 'max_length' => 255)));
		
		$this->setWidget('answer', new aWidgetFormRichTextarea());
    $this->setValidator('answer', new sfValidatorHtml(array('required' => false)));
    
    // Ensures unique IDs throughout the page. Hyphen between slot and form to please our CSS
    $this->widgetSchema->setNameFormat('slot-form-' . $this->id . '[%s]');
    
    // You don't have to use our form formatter, but it makes things nice
    $this->widgetSchema->setFormFormatterName('aAdmin');
  }
}

?>
