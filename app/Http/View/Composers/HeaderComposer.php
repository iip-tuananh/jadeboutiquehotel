<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\PostCategory;
use App\Model\Admin\Room;
use App\Model\Admin\Service;
use App\Model\Admin\Store;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $config = Config::query()->get()->first();
        $serviceCategories = PostCategory::query()
            ->where('type', PostCategory::TYPE_SERVICE)
            ->where('parent_id', 0)
            ->orderBy('sort_order')->get();
        $postCategories = PostCategory::query()
            ->where('type', PostCategory::TYPE_POST)
            ->where('parent_id', 0)
            ->orderBy('sort_order')->get();

        $rooms = Room::query()->where('status', 1)->latest()->get();

        $wishlistItems = \Cart::session('wishlist')->getContent();

        $view->with(['config' => $config,
            'serviceCategories' => $serviceCategories,
            'postCategories' => $postCategories,
            'rooms' => $rooms,
            'wishlistItems' => $wishlistItems
        ]);
    }
}
