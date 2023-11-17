<?php

namespace Elementary\Filament;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentTitleWithSlugServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-title-with-slug';

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-title-with-slug')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations();
    }

    protected function getStyles(): array
    {
        return [
            'filament-title-with-slug-styles' => __DIR__.'/../resources/dist/filament-title-with-slug.css',
        ];
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make('filament-title-with-slug-styles', __DIR__ . '/../resources/dist/filament-title-with-slug.css')->loadedOnRequest(),
        ], 'awcodes/headings');
    }
}
