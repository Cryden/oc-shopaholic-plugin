<?php namespace Lovata\Shopaholic\Controllers;

use Yaml;
use Event;
use BackendMenu;
use Lovata\Shopaholic\Models\Settings;
use Backend\Classes\Controller;

/**
 * Class Categories
 * @package Lovata\Shopaholic\Controllers
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class Categories extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\ReorderController',
        'Backend.Behaviors.RelationController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    /**
     * Categories constructor.
     */
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Lovata.Shopaholic', 'shopaholic-menu-main', 'shopaholic-menu-categories');
    }

    /**
     * Ajax handler onReorder event
     */
    public function onReorder()
    {
        parent::onReorder();
        Event::fire('shopaholic.category.update.sorting');
    }
}