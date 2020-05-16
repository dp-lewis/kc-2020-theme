<?php
namespace Kc2020\Widgets;

use Kc2020\Admin\Forms;

class ContentListing extends \WP_Widget
{
    protected $widget_slug = 'kc2020_widget_content_listing';

    public function __construct()
    {
        parent::__construct(
            $this->widget_slug,
            'Content Listing',
            array( 'description' => 'Create listings of content based on category' )
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $categories = (isset($instance['categories'])) ? $instance['categories'] : 1;
        $total = (isset($instance['total'])) ? $instance['total'] : 1;

        if (!empty($title)) {
            $args = array(
                'post_type' => array('post'),
                'posts_per_page' => $total,
                'cat' => $categories
            );
            $posts = new \Timber\PostQuery($args);

            \Timber::render('contentlisting.twig', array(
                'title' => $title,
                'posts' => $posts
            ));
        }
    }

    public function form($instance)
    {
        $title = esc_attr((isset($instance['title'])) ? $instance['title'] : 'Default Title');
        $categories = esc_attr((isset($instance['categories'])) ? $instance['categories'] : '');
        $total = esc_attr((isset($instance['total'])) ? $instance['total'] : 1);

        echo Forms::text($this->get_field_id('title'), $this->get_field_name('title'), 'Title', $title);
        echo Forms::text($this->get_field_id('categories'), $this->get_field_name('categories'), 'Cat', $categories);
        echo Forms::text($this->get_field_id('total'), $this->get_field_name('total'), 'Total posts', $total);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['categories'] = (!empty($new_instance['categories'])) ? strip_tags($new_instance['categories']) : '';
        $instance['total'] = (!empty($new_instance['total'])) ? strip_tags($new_instance['total']) : '';
        return $instance;
    }
}
