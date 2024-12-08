<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

// In Sales_Model.php
class Sales_Model extends Model
{
    public function getSalesWithProductName()
    {
        // Define the raw SQL query to get sales data with product names
        $query = 'SELECT sales.id, sales.product_id, sales.quantity, sales.total_price, products.name AS product_name 
                  FROM sales 
                  LEFT JOIN products ON sales.product_id = products.id';

        // Execute the raw query
        $data = $this->db->raw($query, array(), PDO::FETCH_OBJ);

        // Return the results
        return $data;
    }
}
?>