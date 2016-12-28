<?php
	require_once("php-ircs.php");
	$ircs = new IRCSource("2AKNRCX34V763NBHVQC7GZNNF3N6CR5FT4LMH58F6DTLFUGVTTS8R94XHWHYW655");
	
	$channel = $ircs->getChannel("BuddyIM", "#Lobby");
	$network = $ircs->getNetwork( $channel->data->network );
	$user = $ircs->getUser("xnite");

	echo $channel->data->channel." on ".$network->data->network." which is run by ".$user->data->username." has an average of ".$channel->data->users." users\n";
?>