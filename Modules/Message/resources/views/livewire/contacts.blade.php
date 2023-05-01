<div class="user-list-box">
    <div class="search">
        <input type="text" class="form-control mx-2 p-2 border-bottom border-0 shadow-lg"
            placeholder="Search or start a new chat" />
    </div>

    <div class="people">
        @if ($contacts ?? [])
            @foreach ($contacts ?? [] as $key => $contact)
                {{-- @dd($user) --}}
                <div class="person" data-chat="person{{ $user->id }}">
                    <div class="user-info">
                        <div class="f-head">
                            <img src="{{ $user->hasMedia(['profile', 'image']) ? $user->media->first()->getUrl() : '/unknown.svg' }}"
                                alt="avatar">
                        </div>
                        <div class="f-body">
                            <div class="meta-info">
                                <span class="user-name" data-name="{{ $user->name }}">{{ $user->name }}</span>
                                <!-- last message timestamp -->
                                <span class="user-meta-time">2:09 PM</span>
                            </div>
                            <!-- last message snippet -->
                            <span class="preview">How do you do?</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            @foreach ($conversations ?? [] as $key => $contact)
                {{-- @dd($user) --}}
                <div class="person" data-chat="person{{ $user->id }}">
                    <div class="user-info">
                        <div class="f-head">
                            <img src="{{ $user->hasMedia(['profile', 'image']) ? $user->media->first()->getUrl() : '/unknown.svg' }}"
                                alt="avatar">
                        </div>
                        <div class="f-body">
                            <div class="meta-info">
                                <span class="user-name" data-name="{{ $user->name }}">{{ $user->name }}</span>
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
