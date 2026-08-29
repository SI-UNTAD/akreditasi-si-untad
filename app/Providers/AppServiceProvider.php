<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
            fn(): string => '<div class="text-center mt-4"><a href="' . url('/') . '" class="text-sm text-gray-500 hover:text-gray-700 underline">← Kembali ke Beranda</a></div>',

        );
    }
}
