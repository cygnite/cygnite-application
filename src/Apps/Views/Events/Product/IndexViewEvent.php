<?php
namespace Apps\Views\Events\Product;

use Cygnite\Mvc\View\ViewInterface;
use Cygnite\Mvc\View\ViewEventInterface;

/**
 * Class IndexViewEvent.
 *
 * @package Apps\Views\Events\Product
 */
class IndexViewEvent implements ViewEventInterface
{
    /**
     * This method gets triggered before view render.
     *
     * Bind the event to view.
     * <code>
     * $this->view->bind('Apps.Views.product.create', \Apps\Views\Events\Product\IndexViewEvent::class);
     * </code>
     *
     * @param ViewInterface $view
     */
    public function creating(ViewInterface $view)
    {
        $view->set('greet', 'Executing Before View Renders.');
    }

    /**
     * This method gets triggered after rendering view.
     *
     * @param ViewInterface $view
     */
    public function rendered(ViewInterface $view)
    {
        // gets executed after view rendered.
    }

}