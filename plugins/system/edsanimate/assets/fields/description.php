<?php
defined('_JEXEC') or die;

class JFormFieldEDS_Description extends JFormField
{
	public $type = 'Description';
	private $params = null;
	
	protected function getLabel(){
		return '';		
	}
	
	protected function getInput(){		
		return '<div>
			<p><strong>Animate It! </strong> is a Joomla Plugins set designed and developed to provide an efficient and user friendly solution to apply beautiful CSS3 animations on Joomla Modules and Articles.</p>		
			<h4><a id="features"></a>Features</h4>
			<ul>
				<li>Allowing user to apply CSS3 animations on modules and articles.</li>
				<li>Capability to apply animation on Scroll.</li>
				<li>Capability to add different scroll offset on individual animation blocks.</li>
				<li>Capability to apply animation on Click.</li>
				<li>Capability to apply animation on Hover.</li>
				<li>Provide special CSS delay classes to create a nice animation sequence with multiple modules.</li>
				<li>Provides a button in the article editor to easily add an animation block in the article.</li>
				<li>Can create nested animation blocks with CSS3 animations.</li>
				<li>Allow user to add animation duration.</li>
				<li>Allow user to apply animation infinitely.</li>				
				<li>Options to enable or disable animations on Smartphones and Tablets.</li>
				<li>A generator is provided to generate classes for animation to be applied on modules.</li>
			</ul>	
		</div>';
	}
	
	private function get($val, $default = '')
	{
		return (isset($this->params[$val]) && (string) $this->params[$val] != '') ? (string) $this->params[$val] : $default;
	}
	
	
}
