<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

// In Products_Controller.php
class Sales_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!logged_in()) {
            redirect('auth');
        }

        // Load the product model
        $this->call->model('Product_Model');
        $this->call->model('Sales_Model');

    }

    public function index()
    {
        // Get all products
        $products = $this->db->table('products')->get_all();

        // Pass products data to the view
        $this->call->view('pages/sales/saleslayout', ['products' => $products]);
    }

    // Function to handle adding a new product
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the form data
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];

            // Perform form validation (optional)
            if (empty($name) || empty($price) || empty($stock)) {
                // Handle validation error (you can add messages to display)
                $this->call->view('pages/products/addProduct', ['error' => 'All fields are required']);
                return;
            }

            // Insert the new product into the database
            $this->db->table('products')->insert([
                'name' => $name,
                'price' => $price,
                'stock' => $stock
            ]);

            // Redirect to the product list after adding the product
            redirect('products');
        }

        // Show the form to add a new product (GET request)
        $this->call->view('pages/products/productslayout');
    }

    public function editProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];

            // Perform validation (optional)
            if (empty($id) || empty($name) || empty($price) || empty($stock)) {
                $this->call->view('pages/products/productslayout', ['error' => 'All fields are required']);
                return;
            }

            // Update the product in the database
            $this->db->table('products')->where('id', $id)->update([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
            ]);

            // Redirect to the product list after editing
            redirect('products');
        }
    }

    public function checkout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the POST data for each product
            $product_ids = explode(',', $_POST['product_ids']);
            $quantities = explode(',', $_POST['quantities']);
            $total_prices = explode(',', $_POST['total_prices']);

            // Loop through each item in the cart
            for ($i = 0; $i < count($product_ids); $i++) {
                $product_id = $product_ids[$i];
                $quantity = $quantities[$i];
                $total_price = $total_prices[$i];

                // Perform necessary validation (e.g., check stock availability)
                $product = $this->db->table('products')->where('id', $product_id)->get();
                if (!$product) {
                    // Handle product not found
                    $this->call->view('pages/sales/saleslayout', ['error' => 'Product not found']);
                    return;
                }

                // Check if stock is available
                if ($product['stock'] < $quantity) {
                    // Handle insufficient stock
                    $this->call->view('pages/sales/saleslayout', ['error' => 'Insufficient stock available']);
                    return;
                }

                // Reduce the stock in the products table
                $new_stock = $product['stock'] - $quantity;
                $this->db->table('products')->where('id', $product_id)->update(['stock' => $new_stock]);

                // Insert the order into the orders table (you can customize this as per your needs)
                $order_data = [
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'total_price' => $total_price,
                ];
                $this->db->table('sales')->insert($order_data);
            }

            // Redirect to a success page or order confirmation page
            redirect('sales');
        }

        // If method is not POST, show error or redirect
        $this->call->view('pages/sales/saleslayout', ['error' => 'Invalid request']);
    }


    public function orders()
    {
        // Load the SalesModel
        $this->call->model('Sales_Model');

        // Get sales data with product name using the model
        $sales = $this->Sales_Model->getSalesWithProductName();

        // Pass sales data to the view
        $this->call->view('pages/orders/orderslayout', ['sales' => $sales]);
    }


}
