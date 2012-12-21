<?php

class PluginsbCampaignMonitorSubscribeActions extends sfActions
{
	/**
	 * Executes  action
	 *
	 * @param sfWebRequest $request A request object
	 */
	public function executeDisplayForm(sfWebRequest $request)
	{
	 	$this->listId = $request->getParameter('list_id', null);
	 	$this->form   = new sbCampaignMonitorSubscribeForm();
	 	$this->form->setDefault('list_id', $this->listId);
	}
	
	/**
	 * Executes  action
	 *
	 * @param sfWebRequest $request A request object
	 */
	public function executeProcessForm(sfWebRequest $request)
	{
		$this->success = false;
	  $this->form = new sbCampaignMonitorSubscribeForm();
	  $this->form->bind($request->getParameter($this->form->getName()));
	  
	  if($this->form->isValid())
	  { 
		  // send the user to the Campaign Monitor API
		  require_once(sfConfig::get('sf_root_dir') . '/plugins/sbApostropheExtraSlotsPlugin/lib/vendor/createsend-php-2.5.2/csrest_subscribers.php');
		  
		  $wrap = new CS_REST_Subscribers($this->form->getValue('list_id'), sfConfig::get('app_sbCampaignMonitorSubscribe_api_key'));
			$result = $wrap->add(array(
			    'EmailAddress' => $this->form->getValue('email'),
			    'Name' => $this->form->getValue('name'),
			    'Resubscribe' => true
			));
			
			if($result->was_successful())
			{
				$this->success = true;
			}
	  }
	}
}