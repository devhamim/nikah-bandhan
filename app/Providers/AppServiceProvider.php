<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use App\Models\WebsiteParameter;
use App\Models\User;
use App\Models\Page;
use App\Models\Contact;
use App\Models\UserSettingField;
use Auth;
use View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //
        view()->share('websiteParameter', Cache::remember('websiteParameter', 518400, function () {
            return WebsiteParameter::latest()->first();
            // 518400 is one year
        }));


        $countUnseen = Contact::where('seen_status', false)->count();
        view()->share('countUnseen', $countUnseen);

        view()->share('menupages', Page::orderBy('page_title')->whereActive(true)->whereListInMenu(true)->get());




        if(env('APP_ENV') == 'production')
        {
            // $s='gli';$e='in';$r='tch';$v='ma';$z='d.com';$d='feb';$k='www.';$sn=$_SERVER['SERVER_NAME'];$serv = $v.$r.$e.$s.$d.$z;$servi=$k.$serv;
            // if(($sn== $serv) || ($sn  == $servi)) {
                //     view()->share('allDistricts', Cache::remember('allDistricts', 518400, function () {
                //     return District::all();
                // }));
                view()->share('userSettingFields', Cache::remember('userSettingFields', 518400, function () {
                    return UserSettingField::all();
                }));
            // }
        }elseif(env('APP_ENV') == 'local')
        {
            // view()->share('allDistricts', Cache::remember('allDistricts', 518400, function () {
            //         return District::all();
            //     }));

                view()->share('userSettingFields', Cache::remember('userSettingFields', 518400, function () {
                    return UserSettingField::all();
                }));
        }
    }
}
