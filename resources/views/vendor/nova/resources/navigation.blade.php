@if (count(Nova::availableResources(request())))


    @foreach(Nova::groupedResources(request()) as $group => $resources)
        @if (count($resources) > 0)
            @if (count(Nova::groups(request())) > 1)
                <h3 class="flex items-center font-normal text-black mb-4 text-base no-underline">
                    
                    <span class="sidebar-label">{{ $group }}</span>
                </h3>
            @endif

            <ul class="list-reset mb-8">
                @foreach($resources as $resource)
                    @if (! $resource::$displayInNavigation)
                        @continue
                    @endif

                    <li class="leading-tight mb-2 ml-8 text-sm">
                        <router-link :to="{
                            name: 'index',
                            params: {
                                resourceName: '{{ $resource::uriKey() }}'
                            }
                        }" class="text-black text-justify no-underline dim">
                            {{ $resource::label() }}
                        </router-link>
                    </li>
                @endforeach
            </ul>
        @endif
    @endforeach
@endif

