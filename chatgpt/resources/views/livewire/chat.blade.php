<div>
    <h1>Chat with our Lua Bot</h1>

    <div id="chat-box ">
        @foreach ($chatHistory as $chat)
            <p><strong>You: </strong>{{ $chat['user'] }}</p>
            <p class="gptRes"><strong>Lua Helper: </strong>{!! nl2br(e($chat['bot'])) !!}</p>
        @endforeach
    </div>

    <input type="text" wire:model="message" wire:keydown.enter="sendMessage">
    <button wire:click="sendMessage"></button>
</div>