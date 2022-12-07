<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/product_controller.php';

$Allbrands = select_all_brands_controller();
$Allcategories = select_all_categories_controller();
if (isset($_GET['editPID'])) {
    $select_one_product = select_a_product_controller($_GET['editPID']);
}

// page if admin logs in
if (isset($_SESSION['user_role']) == '1') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Mazer Admin Dashboard</title>

        <link rel="stylesheet" href="../assets/css/main/app.css">
        <link rel="stylesheet" href="../assets/css/main/app-dark.css">
        <link rel="shortcut icon" href="../assets/images/logo/favicon.svg" type="image/x-icon">
        <link rel="shortcut icon" href="../assets/images/logo/favicon.png" type="image/png">

        <link rel="stylesheet" href="../assets/css/shared/iconly.css">

    </head>

    <body>
        <div id="app">
            <div id="sidebar" class="active">
                <div class="sidebar-wrapper active">
                    <div class="sidebar-header position-relative">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="logo">
                                <a href="index.html"><img src="../assets/images/logo/logo.svg" alt="Logo" srcset=""></a>
                            </div>
                            <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                        <g transform="translate(-210 -1)">
                                            <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                            <circle cx="220.5" cy="11.5" r="4"></circle>
                                            <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <div class="form-check form-switch fs-6">
                                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                    <label class="form-check-label"></label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="sidebar-toggler  x">
                                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-title">Menu</li>

                            <li class="sidebar-item ">
                                <a href="index.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-item  ">
                                <a href="orders.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Orders</span>
                                </a>
                            </li>

                            <li class="sidebar-item  ">
                                <a href="view_products.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>View Products</span>
                                </a>
                            </li>

                            <li class="sidebar-item  active">
                                <a href="add_products.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Add Products</span>
                                </a>
                            </li>

                            <li class="sidebar-item ">
                                <a href="customers.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Customers</span>
                                </a>
                            </li>

                            <li class="sidebar-item ">
                                <a href="payments.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Payments</span>
                                </a>
                            </li>

                            <li class="sidebar-item  ">
                                <a href="brands.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Brands</span>
                                </a>
                            </li>

                            <li class="sidebar-item  ">
                                <a href="categories.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Categories</span>
                                </a>
                            </li>
                            
                            <li class="sidebar-item  ">
                                <a href="../login/logout.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Logout</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>

                <div class="page-heading">
                    <h3>Dashboard</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Add product</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="../actions/processProducts.php" method="POST" enctype="multipart/form-data" class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <!-- <label for="basicInput">Basic Input</label> -->
                                                            <select name="brand" id="brand" class="form-select">
                                                                <option>-- Select a brand --</option>
                                                                <?php
                                                                if (isset($_GET['editPID'])) {
                                                                    echo "<option value='$select_one_product[brand_id]' selected>$select_one_product[brand_name]</option>";
                                                                    foreach ($Allbrands as $brand) {
                                                                        echo "<option value='$brand[brand_id]'>$brand[brand_name]</option>";
                                                                    }
                                                                } else {
                                                                    echo "<option disabled hidden>Select Product Brand</option>";
                                                                    foreach ($Allbrands as $brand) {
                                                                        echo "<option value='$brand[brand_id]'>$brand[brand_name]</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <!-- <label for="basicInput">Basic Input</label> -->
                                                            <input type="text" name="pname" id="pname" class="form-control" id="basicInput" placeholder="Enter product name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <!-- <label for="basicInput">Basic Input</label> -->
                                                            <select name="category" id="category" class="form-select">
                                                                <option>-- Select a category --</option>
                                                                <?php
                                                                if (isset($_GET['editPID'])) {
                                                                    echo "<option value='$select_one_product[cat_id]' selected>$select_one_product[cat_name]</option>";
                                                                    foreach ($Allcategories as $category) {
                                                                        echo "<option value='$category[brand_id]'>$category[brand_name]</option>";
                                                                    }
                                                                } else {
                                                                    echo "<option disabled hidden>Select Product Brand</option>";
                                                                    foreach ($Allcategories as $category) {
                                                                        echo "<option value='$category[cat_id]'>$category[cat_name]</option>";
                                                                    }
                                                                }

                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <!-- <label for="basicInput">Basic Input</label> -->
                                                            <?php
                                                            if (isset($_GET['editPID'])) {
                                                                echo '<input type="text" name="price" id="price" class="form-control" id="basicInput" placeholder="Enter price" value=' . $select_one_product['product_price'] . '>';
                                                            } else {
                                                                echo '<input type="text" name="price" id="price" class="form-control" id="basicInput" placeholder="Enter price">';
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <?php
                                                        if (isset($_GET['editPID'])) {
                                                            echo "<input type='file' name='image' id='image' accept='image/*' class='form-control' id='basicInput'>";
                                                        } else {
                                                            echo '<input type="file" name="image" id="image" class="form-control" id="basicInput">';
                                                        }

                                                        ?>
                                                    </div>
                                                    <div class="col-md-12 my-3">

                                                        <?php
                                                        if (isset($_GET['editPID'])) {
                                                            echo '<textarea class="form-control" name="desc" id="desc" rows="10" id="basicInput" style="resize: none;" placeholder="Enter product description" class="col-md-12">' . $select_one_product['product_desc'] . '</textarea>';
                                                        } else {
                                                            echo '<textarea class="form-control" name="desc" id="desc" rows="10" id="basicInput" style="resize: none;" placeholder="Enter product description" class="col-md-12"></textarea>';
                                                        }

                                                        ?>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <?php
                                                            if (isset($_GET['editPID'])) {
                                                                echo '<input type="text" name="stock" id="stock" class="form-control" value=' . $select_one_product['stock'] . '>';
                                                            } else {
                                                                echo '<input type="text" name="stock" class="form-control" id="stock" placeholder="Enter stock">';
                                                            }

                                                            ?>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <?php
                                                            if (isset($_GET['editPID'])) {
                                                                echo '<input type="text" name="keyword" id="keyword" class="form-control" id="basicInput" placeholder="Enter keyword" value=' . $select_one_product['product_keywords'] . '>';
                                                            } else {
                                                                echo '<input type="text" name="keyword" id="keyword" class="form-control" id="basicInput" placeholder="Enter keyword">';
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="p_id" value="<?php echo $select_one_product['product_id'] ?>">

                                                    <div class="col-md-12 my-3">
                                                        <button class="btn btn-primary" name="<?php

                                                                                                if (isset($_GET['editPID'])) {
                                                                                                    echo "updateProduct";
                                                                                                } else {
                                                                                                    echo "addProduct";
                                                                                                }

                                                                                                ?>" id="addProduct"><?php

                                                                                                                    if (isset($_GET['editPID'])) {
                                                                                                                        echo "Update Product";
                                                                                                                    } else {
                                                                                                                        echo "Add Product";
                                                                                                                    } ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://saugi.me">Saugi</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="../assets/js/bootstrap.js"></script>
        <script src="../assets/js/app.js"></script>

        <!-- Need: Apexcharts -->
        <script src="../assets/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="../assets/js/pages/dashboard.js"></script>

    </body>

    </html>
<?php

} else {
    echo "<script type='text/javascript'> alert('Admin not logged in');
        document.location.href = '../index.php';
        </script>";
}
