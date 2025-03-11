<?php

namespace App\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;
class Chat extends Component
{

    public $message = '';
    public $chatHistory = [];
    public function sendMessage()
    {
        $response = $this->getAiResponse($this->message);

        $this->chatHistory[] = ['user' => $this->message, 'bot' => $response];
        $this->message = '';
    }

    private function getAiResponse($message)
    {
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPEN_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-4o-mini',  
                'messages' => [
                    ['role' => 'user', 'content' => $message],
                ],
                'max_tokens' => 150,
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['choices'][0]['message']['content'];
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
