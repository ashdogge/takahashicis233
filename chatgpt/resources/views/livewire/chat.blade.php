<div>
    <h1 class="display-1 ">Chat with our Lua Bot</h1>

    <div id="chat-box" class="chatbox">
        @foreach ($chatHistory as $chat)
            <p class="chatmsg chatReq"><strong>You: </strong>{{ $chat['user'] }}</p>
            <p class="chatmsg chatRes"><strong>Lua Helper: </strong>{!! nl2br(e($chat['bot'])) !!}</p>
        @endforeach
    </div>

    <input type="text" class="form-control" placeholder="Ask your LUA questions here!" wire:model="message" wire:keydown.enter="sendMessage">
    <button class="btn btn-primary mt-1" wire:click="sendMessage">Send</button>
</div>