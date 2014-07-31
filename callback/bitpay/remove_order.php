<?php

function xtc_remove_order($order_id, $restock = false) 
{
    if ($restock == 'on') 
    {
        $order_query = xtc_db_query("SELECT orders_products_id, products_id, products_quantity FROM " . TABLE_ORDERS_PRODUCTS . " WHERE orders_id = '" . xtc_db_input($order_id) . "';");
        while ($order = xtc_db_fetch_array($order_query)) 
        {
            xtc_db_query("UPDATE " . TABLE_PRODUCTS . " SET products_quantity = products_quantity + " . $order['products_quantity'] . ", products_ordered 	= products_ordered 	- " . $order['products_quantity'] . " WHERE products_id = '" . (int) $order['products_id'] . "';");
            $result = xtc_db_query("SELECT * FROM orders_products_attributes WHERE orders_id = '" . $order_id . "' AND orders_products_id = '" . $order['orders_products_id'] . "';");
            while (($row = xtc_db_fetch_array($result))) 
            {
                $attributes_id = nc_get_products_attributes_id($order['products_id'], $row['products_options'], $row['products_options_values']);
                xtc_db_query("UPDATE products_attributes SET attributes_stock = attributes_stock + " . $order['products_quantity'] . " WHERE products_attributes_id = '" . (int) $attributes_id . "';");
            }
        }
    }

    xtc_db_query("DELETE FROM " . TABLE_ORDERS . " WHERE orders_id = '" . xtc_db_input($order_id) . "';");
    xtc_db_query("DELETE FROM " . TABLE_ORDERS_PRODUCTS . " WHERE orders_id = '" . xtc_db_input($order_id) . "';");
    xtc_db_query("DELETE FROM " . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . " WHERE orders_id = '" . xtc_db_input($order_id) . "';");
    xtc_db_query("DELETE FROM " . TABLE_ORDERS_STATUS_HISTORY . " WHERE orders_id = '" . xtc_db_input($order_id) . "';");
    xtc_db_query("DELETE FROM " . TABLE_ORDERS_TOTAL . " WHERE orders_id = '" . xtc_db_input($order_id) . "';");
}

?>
