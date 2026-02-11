<?php

/* Custom fields on product detail page */
function custom_woocommerce_product_fields() {
	// ✅ Add Monthly RTO (36 months)
    woocommerce_wp_text_input( array(
        'id' => '_monthly_RTO_36_months',
        'label' => __('Monthly RTO (36 Months)', 'woocommerce'),
        'description' => __('Enter the monthly RTO payment for a 36-month term.', 'woocommerce'),
        'desc_tip' => true,
        'type' => 'text',
    ) );

    // ✅ Add Monthly RTO (48 months)
    woocommerce_wp_text_input( array(
        'id' => '_monthly_RTO_48_months',
        'label' => __('Monthly RTO (48 Months)', 'woocommerce'),
        'description' => __('Enter the monthly RTO payment for a 48-month term.', 'woocommerce'),
        'desc_tip' => true,
        'type' => 'text',
    ) );
}
add_action('woocommerce_product_options_general_product_data', 'custom_woocommerce_product_fields');

/* Save Custom Fields Data */
function save_custom_woocommerce_product_fields($post_id) {	
	 // ✅ Save new "Monthly RTO (36 months)" field
    if (isset($_POST['_monthly_RTO_36_months'])) {
        update_post_meta($post_id, '_monthly_RTO_36_months', sanitize_text_field($_POST['_monthly_RTO_36_months']));
    }

    // ✅ Save new "Monthly RTO (48 months)" field
    if (isset($_POST['_monthly_RTO_48_months'])) {
        update_post_meta($post_id, '_monthly_RTO_48_months', sanitize_text_field($_POST['_monthly_RTO_48_months']));
    }
}
add_action('woocommerce_process_product_meta', 'save_custom_woocommerce_product_fields');

// Shortcode to display Monthly RTO prices
function display_monthly_rto_shortcode($atts) {
    global $post;

    if (empty($post) || 'product' !== get_post_type($post)) {
        return ''; // Only run on product pages
    }

    // Get the custom field values
    $rto_36 = get_post_meta($post->ID, '_monthly_RTO_36_months', true);
    $rto_48 = get_post_meta($post->ID, '_monthly_RTO_48_months', true);

    // If neither field has a value, return nothing
    if (empty($rto_36) && empty($rto_48)) {
        return '';
    }

    // Start output buffer
    $output = '<div class="monthly-rto-pricing hide-if-empty">';

    // 48-month plan
    if (!empty($rto_48)) {
        $output .= '<div>$' . esc_html($rto_48) . ' @ 48 Months</div>';
    }

    // 36-month plan
    if (!empty($rto_36)) {
        $output .= '<div>$' . esc_html($rto_36) . ' @ 36 Months</div>';
    }
	$output .= '<p>Monthly Pricing includes RTO Assurance.</br>Taxes not included.</p>';
    $output .= '</div>';

    return $output;
}
add_shortcode(' ', 'display_monthly_rto_shortcode');