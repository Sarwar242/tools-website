{{-- Google AdSense Placeholder --}}
{{-- Replace with your actual AdSense code after approval --}}

@if(config('services.adsense.enabled', false))
    <div class="adsense-container my-6">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ config('services.adsense.client_id') }}"
                crossorigin="anonymous"></script>
        
        @if($slot ?? '' === 'horizontal')
            <!-- Horizontal Ad -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="{{ config('services.adsense.client_id') }}"
                 data-ad-slot="{{ config('services.adsense.slots.horizontal') }}"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
        @elseif($slot ?? '' === 'sidebar')
            <!-- Sidebar Ad -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="{{ config('services.adsense.client_id') }}"
                 data-ad-slot="{{ config('services.adsense.slots.sidebar') }}"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
        @elseif($slot ?? '' === 'in-article')
            <!-- In-article Ad -->
            <ins class="adsbygoogle"
                 style="display:block; text-align:center;"
                 data-ad-layout="in-article"
                 data-ad-format="fluid"
                 data-ad-client="{{ config('services.adsense.client_id') }}"
                 data-ad-slot="{{ config('services.adsense.slots.in_article') }}"></ins>
        @else
            <!-- Auto Ad -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="{{ config('services.adsense.client_id') }}"
                 data-ad-slot="{{ config('services.adsense.slots.auto') }}"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
        @endif
        
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
@else
    {{-- Ad Placeholder for Development --}}
    <div class="my-6 p-8 bg-gray-100 dark:bg-gray-800 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600">
        <div class="text-center text-gray-500 dark:text-gray-400">
            <i class="fas fa-ad text-3xl mb-2"></i>
            <p class="font-medium">Advertisement Space</p>
            <p class="text-sm mt-1">{{ $slot ?? 'auto' }} ad will appear here</p>
        </div>
    </div>
@endif
