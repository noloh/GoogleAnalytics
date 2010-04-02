<?php
require_once('PATH/TO/NOLOH');
require_once('../GoogleAnalytics.php');

class GoogleTest extends WebPage
{
	function GoogleTest()
	{
		parent::WebPage('Google Analytics Test');
		//Enter Your Google Anlytics Code
		GoogleAnalytics::Track('UA-XXXXXX-X');
	}
}
?>