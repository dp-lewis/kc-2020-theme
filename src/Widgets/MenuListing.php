<?php
namespace Kc2020\Widgets;

use Kc2020\Admin\Forms;

class MenuListing extends \WP_Widget
{
    protected $widget_slug = 'kc2020_widget_menu_listing';

    public function __construct()
    {
        parent::__construct(
            $this->widget_slug,
            'Menu Listing',
            array( 'description' => 'Create listings of menu items' )
        );
    }

    public function widget($args, $instance)
    {
        $template = (isset($instance['template'])) ? $instance['template'] : '';
        $cssclasses = (isset($instance['cssclasses'])) ? $instance['cssclasses'] : '';
        $title = apply_filters('widget_title', $instance['title']);
        $menuname = (isset($instance['menuname'])) ? $instance['menuname'] : '';

        if (!empty($title)) {
            $menuitems = new \Timber\Menu($menuname);

            $templateFiles = ['menulisting-' . $template . '.twig', 'menulisting.twig'];

            \Timber::render($templateFiles, array(
                'title' => $title,
                'cssclasses' => $cssclasses,
                'menu' => $menuitems
            ));
        }
    }

    public function form($instance)
    {
        $template = esc_attr((isset($instance['template'])) ? $instance['template'] : '');
        $cssclasses = esc_attr((isset($instance['cssclasses'])) ? $instance['cssclasses'] : '');
        $title = esc_attr((isset($instance['title'])) ? $instance['title'] : 'Default Title');
        $menuname = esc_attr((isset($instance['menuname'])) ? $instance['menuname'] : '');

        echo Forms::text($this->get_field_id('menuname'), $this->get_field_name('menuname'), 'Menu name', $menuname);
        echo Forms::text($this->get_field_id('cssclasses'), $this->get_field_name('cssclasses'), 'CSS', $cssclasses);
        echo Forms::text($this->get_field_id('template'), $this->get_field_name('template'), 'Template', $template);
        echo Forms::text($this->get_field_id('title'), $this->get_field_name('title'), 'Title', $title);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['menuname'] = (!empty($new_instance['menuname'])) ? strip_tags($new_instance['menuname']) : '';
        $instance['template'] = (!empty($new_instance['template'])) ? strip_tags($new_instance['template']) : '';
        $instance['cssclasses'] = (!empty($new_instance['cssclasses'])) ? strip_tags($new_instance['cssclasses']) : '';
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}
