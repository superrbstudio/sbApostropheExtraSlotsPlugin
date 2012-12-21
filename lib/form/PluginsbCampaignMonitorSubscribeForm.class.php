<?php

class PluginsbCampaignMonitorSubscribeForm extends sfForm
{
	public function setup()
	{
		parent::setup();
		
		$this->setWidget('list_id', new sfWidgetFormInputHidden());
		$this->setValidator('list_id', new sfValidatorString());
		
		$this->setWidget('name', new sfWidgetFormInputText(array(), array()));
		$this->setValidator('name', new sfValidatorString(array('required' => true), array('required' => 'Please enter your name')));
		
		$this->setWidget('email', new sfWidgetFormInputText(array(), array()));
		$this->setValidator('email', new sfValidatorEmail(array('required' => true), array('required' => 'Please enter your email address', 'invalid' => 'Please enter a valid email address')));
		
		$this->widgetSchema->setNameFormat('sb-campaign-monitor-subscribe[%s]');
	}
}