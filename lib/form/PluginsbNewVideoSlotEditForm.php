<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PluginsbNewVideoSlotEditForm
 *
 * @author pureroon
 */
abstract class PluginsbNewVideoSlotEditForm extends BaseForm
{
//  // Ensures unique IDs throughout the page
//  protected $id;
//  public function __construct($id, $defaults = array(), $options = array(), $CSRFSecret = null)
//  {
//    $this->id = $id;
//    parent::__construct($defaults, $options, $CSRFSecret);
//  }
//  public function configure()
//  {
//
//    $this->setWidget('videoType', new sfWidgetFormChoice(array('youtube' => 'YouTube', 'vimeo' => 'Vimeo')));
//    $this->setValidator('videoType', new sfValidatorString(array('required' => true)));
//
//    $this->setWidget('videoId', new sfWidgetFormInputText());
//    $this->setValidator('videoId', new sfValidatorString(array('required' => true)));
//
//    // Ensures unique IDs throughout the page. Hyphen between slot and form to please our CSS
//    $this->widgetSchema->setNameFormat('slot-form-' . $this->id . '[%s]');
//
//    // You don't have to use our form formatter, but it makes things nice
//    $this->widgetSchema->setFormFormatterName('aAdmin');
//  }

  // Ensures unique IDs throughout the page
  protected $id;
  public function __construct($id, $defaults = array(), $options = array(), $CSRFSecret = null)
  {
    $this->id = $id;
    parent::__construct($defaults, $options, $CSRFSecret);
  }
  public function configure()
  {

    $this->setWidget('videoType', new sfWidgetFormChoice(array('choices' => array('youtube' => 'YouTube', 'vimeo' => 'Vimeo'))));
    $this->setValidator('videoType', new sfValidatorChoice(array('choices' => array('youtube', 'vimeo'),'required' => true)));

    $this->setWidget('videoId', new sfWidgetFormInputText());
    $this->setValidator('videoId', new sfValidatorString(array('required' => true)));

    // Ensures unique IDs throughout the page. Hyphen between slot and form to please our CSS
    $this->widgetSchema->setNameFormat('slot-form-' . $this->id . '[%s]');

    // You don't have to use our form formatter, but it makes things nice
    $this->widgetSchema->setFormFormatterName('aAdmin');
  }

}

?>
