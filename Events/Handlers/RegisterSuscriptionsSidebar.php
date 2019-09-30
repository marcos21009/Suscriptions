<?php

namespace Modules\Suscriptions\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterSuscriptionsSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('suscriptions::suscriptions.title.suscriptions'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('suscriptions::products.title.products'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.suscriptions.product.create');
                    $item->route('admin.suscriptions.product.index');
                    $item->authorize(
                        $this->auth->hasAccess('suscriptions.products.index')
                    );
                });
            /*    $item->item(trans('suscriptions::plans.title.plans'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.suscriptions.plan.create');
                    $item->route('admin.suscriptions.plan.index');
                    $item->authorize(
                        $this->auth->hasAccess('suscriptions.plans.index')
                    );
                });
                $item->item(trans('suscriptions::features.title.features'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.suscriptions.feature.create');
                    $item->route('admin.suscriptions.feature.index');
                    $item->authorize(
                        $this->auth->hasAccess('suscriptions.features.index')
                    );
                });
            ]*/
                $item->item(trans('suscriptions::suscriptions.title.suscriptions'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.suscriptions.suscription.create');
                    $item->route('admin.suscriptions.suscription.index');
                    $item->authorize(
                        $this->auth->hasAccess('suscriptions.suscriptions.index')
                    );
                });
// append




            });
        });

        return $menu;
    }
}
