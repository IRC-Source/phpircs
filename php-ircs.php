<?php
/*
 * Author:			Robert Whitney <xnite@xnite.me>
 * Description:		Library for accessing the IRC-Source API
 */

class IRCSource
{
	public function __construct( $api_key = null )
	{
		$this->api_key = $api_key;
		$this->error = false;
	}

	public function getUser( $username = null )
	{
		$this->error = false;
		if( $this->api_key == null )
		{
			$this->error = "API key not set!";
			return false;
		}
		if( $username == null )
		{
			$this->error = "Username not specified";
			return false;
		}

		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query( array( "username" => $username ) )
			)
		);

		$context  = stream_context_create($options);
		$result = file_get_contents("https://beta.irc-source.com/api/getUser/".$this->api_key, false, $context);
		if( $result === FALSE )
		{
			$this->error = "Failed to contact API";
			return false;
		}

		return json_decode($result);
	}

	public function getNetwork( $network = null )
	{
		$this->error = false;
		if( $this->api_key == null )
		{
			$this->error = "API key not set!";
			return false;
		}
		if( $network == null )
		{
			$this->error = "Network not specified";
			return false;
		}

		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query( array( "network" => $network ) )
			)
		);

		$context  = stream_context_create($options);
		$result = file_get_contents("https://beta.irc-source.com/api/getNetwork/".$this->api_key, false, $context);
		if( $result === FALSE )
		{
			$this->error = "Failed to contact API";
			return false;
		}
		return json_decode($result);
	}

	public function getChannel( $network = null, $channel = null )
	{
		$this->error = false;
		if( $this->api_key == null )
		{
			$this->error = "API key not set!";
			return false;
		}
		if( $network == null )
		{
			$this->error = "Network not specified";
			return false;
		}
		if( $channel == null )
		{
			$this->error = "Channel not specified";
			return false;
		}

		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query( array( "network" => $network, "channel" => $channel ) )
			)
		);

		$context  = stream_context_create($options);
		$result = file_get_contents("https://beta.irc-source.com/api/getChannel/".$this->api_key, false, $context);
		if( $result === FALSE )
		{
			$this->error = "Failed to contact API";
			return false;
		}
		return json_decode($result);
	}
}
?>