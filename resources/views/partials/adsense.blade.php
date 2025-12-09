{{-- Google AdSense Ad Unit --}}
@if(config('services.adsense.enabled', false))
    <div class="adsense-container my-6">
        <!-- Google AdSense Ad -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="{{ config('services.adsense.client_id') }}"
             data-ad-slot="{{ $slot ?? config('services.adsense.slots.auto') }}"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
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
            <p class="text-sm mt-1">AdSense ad will appear here when enabled</p>
        </div>
    </div>
@endif
