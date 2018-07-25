<?php

namespace Modules\Suscriptions\Presenters;

use Laracasts\Presenter\Presenter;
use Modules\Suscriptions\Entities\Status;

class ProductPresenter extends Presenter
{
    /**
     * @var \Modules\Suscriptions\Entities\Status
     */
    protected $status;
    /**
     * @var \Modules\Suscriptions\Repositories\ProductRepository
     */
    private $product;

    public function __construct($entity)
    {
        parent::__construct($entity);
        $this->product = app('Modules\Suscriptions\Repositories\ProductRepository');
        $this->status = app('Modules\Suscriptions\Entities\Status');
    }

    /**
     * Get the previous post of the current post
     * @return object

    public function previous()
    {
        return $this->post->getPreviousOf($this->entity);
    }
     */
    /**
     * Get the next post of the current post
     * @return object

    public function next()
    {
        return $this->post->getNextOf($this->entity);
    }
*/
    /**
     * Get the post status
     * @return string
     */
    public function status()
    {
        return $this->status->get($this->entity->status);
    }

    /**
     * Getting the label class for the appropriate status
     * @return string
     */
    public function statusLabelClass()
    {
        switch ($this->entity->status) {
            case Status::INACTIVE:
                return 'bg-red';
                break;
            /*case Status::PENDING:
                return 'bg-orange';
                break;*/
            case Status::ACTIVE:
                return 'bg-green';
                break;
           /* case Status::UNPUBLISHED:
                return 'bg-purple';
                break;
           */
            default:
                return 'bg-red';
                break;
        }
    }
}
