<?php

namespace App\Providers;

use App\Library\Utils\Factory;
use App\Library\Utils\LibraryFactory;
use App\Library\Utils\LibraryManager;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class LibraryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        require app_path('Library/Libs/helper.php');
        require app_path('Library/Libs/models.php');
        $urls = parse_url(Request::Url());
        $host = $urls['host'];
        $prefix = explode('.', $host)[0];

//        if (strtolower($prefix) == 'admin') {
//            list($menu, $sidebarHtml) = getNavConfig();
//            view()->share('menu', $menu);
//            view()->share('silderMenu', $sidebarHtml);
//        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('LibraryManager', function ($app) {
            return new LibraryManager($app);
        });
    }

}