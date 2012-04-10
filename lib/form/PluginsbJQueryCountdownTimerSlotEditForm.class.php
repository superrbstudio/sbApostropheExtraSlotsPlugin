<?php    
class PluginsbJQueryCountdownTimerSlotEditForm extends BaseForm
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
    $this->setWidget('countdown_to_date', new aWidgetFormJQueryDate(
			array('image' => '/apostrophePlugin/images/a-icon-datepicker.png'))
		);

    $this->setValidator('countdown_to_date', new sfValidatorDate(
      array(
        'required' => true,
      )));

    $this->setWidget('countdown_to_time', new aWidgetFormJQueryTime(array(), array('twenty-four-hour' => false, 'minutes-increment' => 30)));
    $this->setValidator('countdown_to_time', new sfValidatorTime(array('required' => false)));

    // Ensures unique IDs throughout the page. Hyphen between slot and form to please our CSS
    $this->widgetSchema->setNameFormat('slot-form-' . $this->id . '[%s]');
    
    // You don't have to use our form formatter, but it makes things nice
    $this->widgetSchema->setFormFormatterName('aAdmin');
  }
}