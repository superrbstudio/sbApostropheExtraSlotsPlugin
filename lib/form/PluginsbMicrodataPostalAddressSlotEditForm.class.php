<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PluginsbMicrodataPostalAddressSlotEditForm
 *
 * @author pureroon
 */
abstract class PluginsbMicrodataPostalAddressSlotEditForm extends BaseForm
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
    $this->setWidget('description', new sfWidgetFormInputText());
		$this->setValidator('description', new sfValidatorString(array('required' => false)));
		
		$this->setWidget('name', new sfWidgetFormInputText());
		$this->setValidator('name', new sfValidatorString(array('required' => false)));
		
		$this->setWidget('url', new sfWidgetFormInputText());
		$this->setValidator('url', new sfValidatorString(array('required' => false)));
		
		$this->setWidget('email', new sfWidgetFormInputText());
		$this->setValidator('email', new sfValidatorEmail(array('required' => false)));
		
		$this->setWidget('fax_number', new sfWidgetFormInputText());
		$this->setValidator('fax_number', new sfValidatorString(array('required' => false)));
		
		$this->setWidget('telephone', new sfWidgetFormInputText());
		$this->setValidator('telephone', new sfValidatorString(array('required' => false)));
		
		$this->setWidget('street_address', new sfWidgetFormTextarea());
		$this->setValidator('street_address', new sfValidatorString(array('required' => false)));
		
		$this->setWidget('post_office_box_number', new sfWidgetFormInputText());
		$this->setValidator('post_office_box_number', new sfValidatorString(array('required' => false)));
		
		$this->setWidget('address_locality', new sfWidgetFormInputText());
		$this->setValidator('address_locality', new sfValidatorString(array('required' => false)));
		
		$this->setWidget('address_region', new sfWidgetFormInputText());
		$this->setValidator('address_region', new sfValidatorString(array('required' => false)));
		
		$this->setWidget('postal_code', new sfWidgetFormInputText());
		$this->setValidator('postal_code', new sfValidatorString(array('required' => false)));
		
		$this->setWidget('address_country', new sfWidgetFormI18nChoiceCountry());
		$this->setValidator('address_country', new sfValidatorI18nChoiceCountry(array('required' => false)));
    
    // Ensures unique IDs throughout the page. Hyphen between slot and form to please our CSS
    $this->widgetSchema->setNameFormat('slot-form-' . $this->id . '[%s]');
    
    // You don't have to use our form formatter, but it makes things nice
    $this->widgetSchema->setFormFormatterName('aAdmin');
  }
}

?>
