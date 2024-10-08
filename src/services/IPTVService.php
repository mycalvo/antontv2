<?php

namespace App\Services;

use GuzzleHttp\Client;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class IPTVService {
    protected $client;
    protected $apiUrl;
    protected $apiKey;
    protected $logger;

    public function __construct() {
        $this->client = new Client();
        $config = include(__DIR__ . '/../config.php');
        $this->apiUrl = $config['xtream']['api_url'];
        $this->apiKey = $config['xtream']['api_key'];
        $this->logger = new Logger('IPTVService');
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/../../logs/app.log', Logger::DEBUG));
    }

    public function getLiveChannels() {
        try {
            $response = $this->client->get($this->apiUrl . '/player_api.php', [
                'query' => [
                    'action' => 'get_live_streams',
                    'api_key' => $this->apiKey
                ]
            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            $this->logger->error('Error fetching live channels: ' . $e->getMessage());
            return [];
        }
    }

    public function handleErrors() {
        // Lógica para manejar errores y cambiar de servidor remoto si es necesario
        $this->logger->info('Handling errors and switching servers if necessary');
    }
}
