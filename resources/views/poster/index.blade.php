<x-app-layout>

    <x-slot name="header">
        <div class=" pb-1 bg-white">
                <div class="shrink-0 flex items-center space-x-8">
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('index') }}" :active="request()->routeIs('dashboard')">
                            {{ __('餐點管理') }}
                        </x-jet-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="" :active="request()->routeIs('dashboard')">
                            {{ __('類別管理') }}
                        </x-jet-nav-link>
                    </div>
                </div>
            </div>
    </x-slot>

        <!--內容-->
    <h1>poster dashboard</h1>

</x-app-layout>





