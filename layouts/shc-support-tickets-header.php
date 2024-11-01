<?php if (!defined('ABSPATH')) exit;
global $support_tickets_shc_count; ?><table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <?php if (emd_is_item_visible('ent_ticket_id', 'wp_ticket_com', 'attribute', 1)) { ?>

            <th class="search-results-header"><?php esc_html_e('Ticket ID', 'wp-ticket-com'); ?></th>
            <?php
} ?>

            <th class="search-results-header"><?php esc_html_e('Subject', 'wp-ticket-com'); ?></th>
            <?php if (emd_is_item_visible('tax_ticket_status', 'wp_ticket_com', 'taxonomy', 1)) { ?>

            <th class="search-results-header"><?php esc_html_e('Status', 'wp-ticket-com'); ?></th>
            <?php
} ?>
<?php if (emd_is_item_visible('tax_ticket_priority', 'wp_ticket_com', 'taxonomy', 1)) { ?>

            <th class="search-results-header"><?php esc_html_e('Priority', 'wp-ticket-com'); ?></th>
            <?php
} ?>
<?php if (shortcode_exists('wpas_woo_order_woo_ticket')) {
?>

            <th class="search-results-header"><?php esc_html_e('Order', 'wp-ticket-com'); ?></th>
            <?php
}
?>
<?php if (shortcode_exists('wpas_woo_product_woo_ticket')) {
?>

            <th class="search-results-header"><?php esc_html_e('Product', 'wp-ticket-com'); ?></th>
            <?php
}
?>
<?php if (shortcode_exists('wpas_edd_order_edd_ticket')) {
?>

            <th class="search-results-header"><?php esc_html_e('Order', 'wp-ticket-com'); ?></th>
            <?php
}
?>
<?php if (shortcode_exists('wpas_edd_product_edd_ticket')) {
?>

            <th class="search-results-header"><?php esc_html_e('Download', 'wp-ticket-com'); ?></th>
            <?php
}
?>

            <th class="search-results-header"><?php esc_html_e('Updated', 'wp-ticket-com'); ?></th>
        </tr>
    </thead>
    <tbody>