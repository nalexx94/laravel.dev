<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 28.01.2017
 * Time: 20:14
 */

namespace App\Services;

use App\Menu;
use App\MenuItems;
use Sentinel;

class MenuService
{
    public $menu  = false;
    public $menuItems = [];
    public function __construct()
    {

    }

    public function getMenuByLocation($location = 'header'){
        $res = (new Menu())->where('location','=',$location)->first();
        $this->menu = $res;
        $this->menuItems = $res->menuItems()->get()->toArray();
        return $this;
    }

    public function getMenuItems() {
        return $this->menuItems;
    }

    public function getMenu()
    {
        return $this->menu;
    }

    public function getCabinetMenu(){
        if (Sentinel::check())
        {
            $user = Sentinel::getUser();
            if ($user->hasAccess(['admin'])) {
                return $this->getMenuByLocation('admin')->getMenuItems();
            }
            else {
                return $this->getMenuByLocation('cabinet')->getMenuItems();
            }
        }

    }
}