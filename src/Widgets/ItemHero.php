<?php
namespace Kc2020\Widgets;

use Kc2020\Admin\Forms;

class ItemHero extends \WP_Widget
{
    protected $widget_slug = 'kc2020_widget_item_hero';

    public function __construct()
    {
        parent::__construct(
            $this->widget_slug,
            'Item Hero',
            array( 'description' => 'Big image and some copy' )
        );

        Forms::loadJavaScript();
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $subtitle = $instance['subtitle'];
        $url = $instance['url'];
        $linktitle = $instance['linktitle'];
        $imageUrl = wp_get_attachment_url($instance['photo']);

        if (!empty($title)) {
            \Timber::render('itemhero.twig', array(
                'title' => $title,
                'subtitle' => $subtitle,
                'url' => $url,
                'imageUrl' => $imageUrl,
                'imageID' => $instance['photo'],
                'linktitle' => $linktitle
            ));
        }
    }

    public function form($instance)
    {
        $title = esc_attr((isset($instance['title'])) ? $instance['title'] : 'Default Title');
        $subtitle = esc_attr((isset($instance['subtitle'])) ? $instance['subtitle'] : '');
        $photo = (isset($instance['photo'])) ? $instance['photo'] : '';
        $url = (isset($instance['url'])) ? $instance['url'] : '';
        $linktitle = (isset($instance['linktitle'])) ? $instance['linktitle'] : '';
        $imageUrl = wp_get_attachment_url($photo);

        echo Forms::text($this->get_field_id('title'), $this->get_field_name('title'), 'Title', $title);
        echo Forms::text($this->get_field_id('subtitle'), $this->get_field_name('subtitle'), 'Subtitle', $subtitle);
        echo Forms::text($this->get_field_id('linktitle'), $this->get_field_name('linktitle'), 'Link', $linktitle);
        echo Forms::text($this->get_field_id('url'), $this->get_field_name('url'), 'Link URL', $url);
        echo Forms::imageUpload($this->get_field_id('photo'), $this->get_field_name('photo'), '', $photo, $imageUrl);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['subtitle'] = (!empty($new_instance['subtitle'])) ? strip_tags($new_instance['subtitle']) : '';
        $instance['photo'] = (!empty($new_instance['photo'])) ? strip_tags($new_instance['photo']) : '';
        $instance['linktitle'] = (!empty($new_instance['linktitle'])) ? strip_tags($new_instance['linktitle']) : '';
        $instance['url'] = (!empty($new_instance['url'])) ? strip_tags($new_instance['url']) : '';
        return $instance;
    }
}
