<?php 

/**
  *	Editor Xtended - Animate It!
  * Copyright (C) 2014 eLEOPARD Design Studios Pvt Ltd. All rights reserved

  * This program is free software: you can redistribute it and/or modify
  * it under the terms of the GNU General Public License as published by
  * the Free Software Foundation, either version 3 of the License, or
  * (at your option) any later version.

  * This program is distributed in the hope that it will be useful,
  * but WITHOUT ANY WARRANTY; without even the implied warranty of
  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  * GNU General Public License for more details.

  * You should have received a copy of the GNU General Public License
  * along with this program.  If not, see <http://www.gnu.org/licenses/>.

  * For any other query please contact us at contact[at]eleopard[dot]in
**/
?>

<?php

defined('_JEXEC') or die;

class PlgButtonEDSAnimate extends JPlugin
{

	protected $autoloadLanguage = true;

	public function onDisplay($name)
	{
		$doc = JFactory::getDocument();
		
		$button = new JObject;
		
		if (JFactory::getApplication()->isSite())
		{
			return $button;
		}
		
		
		$js = "
			function insertEdsAnimateTag(editor, content)
			{
					jInsertEditorText(
					content,
					editor);			
			}
			";

		$doc->addScriptDeclaration($js);
		
		JHtml::_('behavior.modal');
		
		JHtml::stylesheet('plugins/editors-xtd/edsanimate/assets/style.css', false, true);
			
		/*$link = 'index.php?'
			. 'folder=plugins.editors-xtd.edsanimate'
			. '&file=edsanimate.inc.php'
			. '&ih_name='.$name;*/
		$link = '../plugins/editors-xtd/edsanimate/popup.php?ih_name='.$name;
			
			
		$button->modal = true;
		$button->class = 'btn';
		$button->link = $link;
		$button->text = JText::_('Animate It!');
		$button->name = 'wand';
		$button->options = "{handler: 'iframe', size: {x:window.getSize().x-100, y: window.getSize().y-100}}";

		return $button;

	}
}
