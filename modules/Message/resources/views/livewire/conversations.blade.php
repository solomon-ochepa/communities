<div class="user-list-box">
    <div class="search">
        <input type="search" class="form-control mx-2 p-2 border-bottom border-0 shadow-lg"
            placeholder="Search or start a new chat" wire:model="search" />
    </div>

    <div class="people">
        @if ($searches ?? [])
            @if ($searches['contacts'])
                <div class="py-2 mx-3 border-bottom border-dashed">
                    {{ __('Users') }}
                </div>

                @foreach ($searches['contacts'] ?? [] as $key => $contact)
                    {{-- @dd($contact) --}}
                    <div class="person py-2" wire:click="chat({{ $contact->id }})" data-chat="person{{ $key + 1 }}">
                        <div class="user-info">
                            <div class="f-head">
                                <img src="{{ $contact->hasMedia(['profile', 'image']) ? $contact->media->first()->getUrl() : '/unknown.svg' }}"
                                    alt="avatar">
                            </div>
                            <div class="f-body">
                                <div class="meta-info">
                                    <span class="user-name" data-name="{{ $contact->name }}">{{ $contact->name }}</span>
                                    <!-- last message timestamp -->
                                    <span class="user-meta-time">{{ now()->format('h:i A') }}</span>
                                </div>
                                <!-- last message snippet -->
                                <span class="preview"> ... </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        @else
            @foreach ($conversations ?? [] as $key => $conversation)
                {{-- @dd($user) --}}
                <div class="person" data-chat="person{{ $key + 1 }}">
                    <div class="user-info">
                        <div class="f-head">
                            {{-- channel->media --}}
                            <img src="{{ $conversation->hasMedia(['profile', 'image']) ? $user->media->first()->getUrl() : '/unknown.svg' }}"
                                alt="avatar">
                        </div>
                        <div class="f-body">
                            <div class="meta-info">
                                <span class="user-name"
                                    data-name="{{ $conversation->subject }}">{{ $conversation->subject }}</span>
                                <!-- last message timestamp -->
                                <span class="user-meta-time">2:09 PM</span>
                            </div>
                            <!-- last message snippet -->
                            <span class="preview">How do you do?</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
