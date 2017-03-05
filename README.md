# OneSignal Notification Pusher for Joomla!
A very simple [Joomla!](https://www.joomla.org/) plugin to send push notifications via [OneSignal](https://onesignal.com) REST API.

### Setup
The file `onesignalhelper.php` contains the code for OneSignal. You should:

* set `$onesignal_app_id` to your OneSignal application ID,
* set `$onesignal_rest_key` to your OneSignal REST API key.
* customize segments, contents, additional custom data and other options (see https://documentation.onesignal.com/v3.0/reference#create-notification).

The file `onesignalnotificationpusher.php` is a Joomla! content plugin, and you might want to change filters (context, categories, etc.) and criteria for sending the notification (after the content is saved or created). See https://docs.joomla.org/Plugin/Events/Content#onContentAfterSave.

### Installation
Install and enable the plugin. The plugin is called after a content is saved.