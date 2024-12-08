<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Home extends Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!logged_in()) {
            redirect('auth');
        }
        $this->call->model('Product_Model');
        $this->call->model('Sales_Model');
    }

    public function dashboard()
    {
        $this->call->model('Sales_Model');

        // Fetch all products
        $products = $this->db->table('products')->get_all();

        // Get the sum of product prices
        $productsSum = $this->db->table('sales')->select_sum('total_price')->get(); // Use getRowArray() instead of getRow()
        $stocksSum = $this->db->table('products')->select_sum('stock')->get(); // Use getRowArray() instead of getRow()

        // Extract the sum value from the result
        $productsSumValue = $productsSum['SUM(total_price)']; // Access using array notation
        $stocksSumValue = $stocksSum['SUM(stock)']; // Access using array notation

        // Get the count of products (length of the result array)
        $productCount = count($products);

        // Prepare the response data

        $salesData = $this->Sales_Model->getSalesWithProductName();
        $productsData = $this->db->table('products')->get_all();

        // Prepare the data for the chart
        $productNames = [];
        $quantities = [];
        $stocks = [];
        $productNames2 = [];

        foreach ($salesData as $sale) {
            $productNames[] = $sale['product_name']; // Use array notation
            $quantities[] = $sale['quantity']; // Use array notation
        }


        foreach ($productsData as $product) {
            $productNames2[] = $product['name']; // Use array notation
            $stocks[] = $product['stock']; // Use array notation
        }



        $data = [
            'productCount' => $productCount,
            'productsSum' => $productsSumValue,
            'stocksSum' => $stocksSumValue,
            'productNames' => json_encode($productNames), // Convert to JSON to pass to the view
            'quantities' => json_encode($quantities), // Convert to JSON to pass to the view
            'productNames2' => json_encode($productNames2), // Convert product names to JSON
            'stocks' => json_encode($stocks), // Convert stock quantities to JSON
    
        ];

        // Return the response as JSON
        $this->call->view(
            'pages/dashboard/dashboardlayout',
            $data
        );
    }








}

?>