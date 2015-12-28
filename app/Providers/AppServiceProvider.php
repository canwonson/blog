<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tag;
use App\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $tags = Tag::lists('tag')->all();
        view()->composer('index',view()->share('tags',$tags));

        //后台菜单
        $menus = Menu::where('parent_id','=',0)->orderBy('order','asc')->get();
        foreach ($menus as &$value) {
            $value['child_list'] = Menu::where('parent_id','=',$value['id'])->where('status','=',1)->orderBy('order','asc')->get();
        }
        view()->composer('admin',view()->share('menus',$menus));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
