<?php
namespace Kc2020;

class AdminMenuSetup
{
    private $nonceAction = 'Kc2020_admin_menu_save';
    private $nonceFieldName = 'Kc2020_admin_menu';
    private $iconName = 'kc2020_menu_icon';

    public function __construct()
    {
        add_action('wp_nav_menu_item_custom_fields', array( $this, 'customFields' ), 10, 2);
        add_action( 'wp_update_nav_menu_item',  array( $this, 'navUpdate' ), 10, 2 );
    }

    public function customFields($item_id, $item)
    {
        wp_nonce_field($this->nonceAction, $this->nonceFieldName);

        $icon = get_post_meta( $item_id, $this->iconName, true );

        $context = [
            'item_id' => $item_id,
            'iconValue' => $icon,
            'iconName' => $this->iconName
        ];

        \Timber::render('admin/menu.twig', $context);
    }

    public function navUpdate($menu_id, $menu_item_db_id) {
        $allowedHTML = [
            'svg' => [
                'xmlns' => [],
                'viewbox' => []
            ],
            'defs' => [],
            'g' => [
                'fill' => [],
                'fill-rule' => []
            ],
            'path' => [
                'd' => []
            ]
            ];
        // Verify this came from our screen and with proper authorization.
        if ( ! isset( $_POST[$this->nonceFieldName] ) || ! wp_verify_nonce( $_POST[$this->nonceFieldName], $this->nonceAction ) ) {
            return $menu_id;
        }

        if ( isset( $_POST[$this->iconName][$menu_item_db_id]  ) ) {
            $sanitized_data = wp_kses( $_POST[$this->iconName][$menu_item_db_id], $allowedHTML);
            update_post_meta( $menu_item_db_id, $this->iconName, $sanitized_data );
        } else {
            delete_post_meta( $menu_item_db_id, $this->iconName );
        }        
    }
}