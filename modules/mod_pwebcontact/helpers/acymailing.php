<?php
/**
* @version 3.0
* @package PWebContact
* @subpackage Acymailing
* @copyright © 2013 Perfect Web sp. z o.o., All rights reserved. http://www.perfect-web.co
* @license GNU General Public License http://www.gnu.org/licenses/gpl-3.0.html
* @author Piotr Moćko
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

class modPWebContactAcymailingHelper
{
	public static function getMailtoField($lists_ids = null, $module_id = null) 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		
		//get Acymailing lists
		$query->select('l.listid, l.name')
			  ->from('#__acymailing_list AS l')
			  ->where('l.published = 1')
			  ->orderby('l.ordering', 'asc')
			  ;
		if (strpos($lists_ids, ',') !== false) 
			$query->where('l.listid IN ('.$lists_ids.')');
		
		$db->setQuery($query);
		
		try {
			$lists = $db->loadObjectList();
		} catch (RuntimeException $e) {
			if (PWEBCONTACT_DEBUG) modPwebcontactHelper::setLog('Acymailing query error: '.$e->getMessage());
			return false;
		}
		if (version_compare(JVERSION, '3.0.0') == -1 AND $error = $db->getErrorMsg()) {
			if (PWEBCONTACT_DEBUG) modPwebcontactHelper::setLog('Acymailing query error: '.$error);
			return false;
		}
		
		$html = '<select name="acymailing_mailto" id="pwebcontact'.$module_id.'_acymailing_mailto" class="pweb-select required">'.
				'<option value="">'.JText::_( 'MOD_PWEBCONTACT_SELECT' ).'</option>';
		foreach ($lists as $list) {
			$html .= '<option value="'.$list->listid.'">'.$list->name.'</option>';
		}
		$html .= '</select>';
		
		return $html;
	}
	
	
	public static function getEmails($list_id = 0) 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		
		//get Acymailing subscribers email
		$query->select('s.email')
			  ->from('#__acymailing_subscriber AS s')
			  ->join('LEFT', '#__acymailing_listsub AS l ON s.subid = l.subid')
			  ->where('l.listid = ' . (int)$list_id)
			  ->where('l.status = 1')
			  ->where('s.enabled = 1')
			  ->where('s.accept = 1')
			  ;
		$db->setQuery($query);
		
		try {
			$emails = $db->loadColumn();
		} catch (RuntimeException $e) {
			if (PWEBCONTACT_DEBUG) modPwebcontactHelper::setLog('Acymailing query error: '.$e->getMessage());
			return false;
		}
		if (version_compare(JVERSION, '3.0.0') == -1 AND $error = $db->getErrorMsg()) {
			if (PWEBCONTACT_DEBUG) modPwebcontactHelper::setLog('Acymailing query error: '.$error);
			return false;
		}
		if (is_array($emails) AND count($emails)) {
			return $emails;
		}
		
		return false;
	}
}