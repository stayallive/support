<?php

namespace Stayallive\Support\Gravatar;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Gravatar {

	const BASE_HTTP  = 'http://www.gravatar.com/avatar/';
	const BASE_HTTPS = 'https://secure.gravatar.com/avatar/';

	/**
	 * Guzzle HTTP Client.
	 *
	 * @var \GuzzleHttp\Client
	 */
	private $client;

	/**
	 * Create new Gravatar helper instance.
	 *
	 * @param \GuzzleHttp\Client $client
	 */
	public function __construct(Client $client) {
		$this->client = $client;
	}

	/**
	 * Build a gravatar url.
	 *
	 * @param        $email
	 * @param int    $size
	 * @param string $default
	 * @param bool   $https
	 *
	 * @return string
	 */
	public function buildURL($email, $size = 100, $default = 'mm', $https = true) {
		$url = ($https) ? self::BASE_HTTPS : self::BASE_HTTP;

		$url .= md5($email);
		$url .= '?s=' . $size;
		$url .= '&d=' . $default;

		return $url;
	}

	/**
	 * Check if a gravatar exists.
	 *
	 * @param $email
	 *
	 * @return bool
	 */
	public function exists($email) {
		$gravatar = $this->buildURL($email, 100, 404);

		try {
			$this->client->head($gravatar);

			return true;
		} catch (RequestException $e) {
			return false;
		}
	}

} 