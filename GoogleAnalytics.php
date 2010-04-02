<?php
/**
 * GoogleAnalytics Nodule
 */
final class GoogleAnalytics
{
	/**
	 * Begins tracking this page, that is, reporting to Google servers activity associated with a particular account.
	 * @param string $accountNumber This is a number given to you by Google that uniquely associates you with your account.
	 */	
	static function Track($accountNumber)
	{
		// URL to download Google Analytics API JavaScripts. Note that there is a http and a https version.
		$url = (isset($_SERVER['HTTPS'])?'https://ssl.':'http://www.') . 'google-analytics.com/ga.js';
		// Add those scripts.
		ClientScript::AddSource($url, false);
		// The code to report this use of the page to Google servers.
		ClientScript::RaceQueue(WebPage::That(), '_gat', "pageTracker = _gat._getTracker('$accountNumber');pageTracker._trackPageview();");
		// Report back to Google servers every time tokens are changed too.
		URL::SetTracker(new RaceClientEvent('pageTracker', 'pageTracker._trackPageview', URL::Tokens));
	}
}
?>