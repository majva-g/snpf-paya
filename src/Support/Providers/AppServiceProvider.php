<?php

namespace Support\Providers;

use Domain\Tenant\Product\Models\Attribute;
use Domain\Tenant\Product\Models\Brand;
use Domain\Tenant\Product\Models\BrandCategory;
use Domain\Tenant\Product\Models\Category;
use Domain\Tenant\Product\Models\Color;
use Domain\Tenant\Product\Models\Group;
use Domain\Tenant\Product\Models\Palette;
use Domain\Tenant\Product\Models\Text;
use Domain\Tenant\Product\Models\Value;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
