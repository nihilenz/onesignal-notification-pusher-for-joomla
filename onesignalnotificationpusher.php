<?php

defined('_JEXEC') or die;
jimport('joomla.plugin.plugin');
include 'onesignalhelper.php';

class plgContentOnesignalnotificationpusher extends JPlugin {
	function plgContentOnesignalnotificationpusher(&$subject, $params) {
    	parent::__construct($subject, $params);
	}

	public function onContentAfterSave($context, $article, $isNew) {
		//var_dump($context); var_dump($article); exit;
        $saveOnContentModified = true;
        
		// Article
		if (isset($context) && $context == "com_content.article") {
			// Filtered categories
			$categories = array("1", "2", "3");
			if (isset($article->catid) && in_array($article->catid, $categories)) {
				// Published and public
				if ($article->state == 1 && $article->access == 1) {
				 	// Send push notification
				 	if ($saveOnContentModified || $isNew) {
						OnesignalHelper::sendPushNotification($article->title, $article->link, $article->id, $article->catid);
					}	
				}
			}
		}
		
		return true;
	}
}