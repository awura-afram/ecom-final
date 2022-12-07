<?php
include_once (dirname(__FILE__)) . '/../controllers/product_controller.php';

// --------------------------------------------BRAND------------------------------------------------------
// addBrand
if (isset($_POST['addBrand'])) {

    $brand_name = $_POST['brand'];

    $check_brand = check_brand_controller($brand_name);

    if ($check_brand) {
        echo "<script>alert('Brand already exists'); 
                document.location.href='../admin/brands.php';
            </script>";
    } else {
        $result = add_brand_controller($brand_name);
        if ($result) {
            echo "<script>alert('Brand has been added'); document.location.href='../admin/brands.php';</script>";
        } else {
            echo "<script>alert('Failed to add brand'); document.location.href='../admin/brands.php';</script>";
        }
    }
}

// edit brand
if (isset($_POST['updateBrand'])) {
    $brand_id = $_POST['brand_id'];
    $brand_name = $_POST['brand'];

    $result = update_brand_controller($brand_id, $brand_name);

    if ($result) {
        echo "<script>alert('Brand has been updated'); document.location.href='../admin/brands.php';</script>";
    } else {
        echo "<script>alert('Failed to update brand'); document.location.href='../admin/brands.php';</script>";
    }
}

// delete brand
if (isset($_GET['deleteBrandID'])) {
    $brand_id = $_GET['deleteBrandID'];

    $result = delete_brand_controller($brand_id);

    if ($result) {
        echo "<script>alert('Brand deleted successfully'); document.location.href='../admin/brands.php';</script>";
    } else {
        echo "<script>alert('Failed to delete brand'); document.location.href='../admin/brands.php';</script>";
    }
}
// --------------------------------------------BRAND ENDS------------------------------------------------------



// --------------------------------------------CATEGORY------------------------------------------------------
// addCategory
if (isset($_POST['addCategory'])) {

    $cat_name = $_POST['category'];

    $check_category = check_category_controller($cat_name);

    if ($check_category) {
        echo "<script>alert('Category already exists'); 
                document.location.href='../admin/categories.php';
            </script>";
    } else {
        $result = add_category_controller($cat_name);
        if ($result) {
            echo "<script>alert('Category has been added'); document.location.href='../admin/categories.php';</script>";
        } else {
            echo "<script>alert('Failed to add category'); document.location.href='../admin/categories.php';</script>";
        }
    }
}


// delete category
if (isset($_GET['deleteCatID'])) {

    $cat_id = $_GET['deleteCatID'];

    $result = delete_category_controller($cat_id);

    if ($result) {
        echo "<script>alert('Category deleted successfully'); document.location.href='../admin/categories.php';</script>";
    } else {
        echo "<script>alert('Failed to delete category'); document.location.href='../admin/categories.php';</script>";
    }
}

// edit category
if (isset($_POST['updateCategory'])) {
    $cat_id = $_POST['cat_id'];
    $cat_name = $_POST['category'];

    $result = update_category_controller($cat_id, $cat_name);

    if ($result) {
        echo "<script>alert('Category updated successfully'); document.location.href='../admin/categories.php';</script>";
    } else {
        echo "<script>alert('Failed to update category'); document.location.href='../admin/categories.php';</script>";
    }
}

// --------------------------------------------CATEGORY ENDS------------------------------------------------------



// --------------------------------------------PRODUCT------------------------------------------------------

// add product
if (isset($_POST['addProduct'])) {
    $product_cat = $_POST['category'];
    $product_brand = $_POST['brand'];
    $product_title = $_POST['pname'];
    $product_price = $_POST['price'];
    $product_desc = $_POST['desc'];
    $product_key = $_POST['keyword'];
    $product_stock = $_POST['stock'];


    $check_product = check_product_controller($product_title);
    if ($check_product) {
        echo "<script>alert('This Product already exists'); window.history.back();</script>";
    } else {
        $target_dir = "../assets/images/products/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (empty($_FILES["image"]["name"])) {
            echo "Must insert an Image";
        } else {
            $img_size = getimagesize($_FILES["image"]["tmp_name"]);
            if ($img_size == false) {
                echo "The file is not a valid image";
            }
            if ($_FILES["image"]["size"] > 5000000000) {
                echo "Image file is too large";
            }
            if ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }

            $image_upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            if ($image_upload) {
                $addProduct = add_product_controller($product_cat, $product_brand, $product_title, $product_price, $product_desc, $target_file, $product_key, $product_stock);
                if ($addProduct == true) {
                    echo "<script type='text/javascript'> alert('Successfully added Product');
                    document.location.href = '../admin/add_products.php';
                    </script>";
                } else {
                    echo "<script type='text/javascript'> alert('Failed to insert');              
                    window.history.back();
                    </script>";
                }
            } else {
                echo "<script type='text/javascript'> alert('Upload Failed');              
                window.history.back();
                </script>";
            }
        }
    }
}

// deleteproduct
if (isset($_GET['deletePID'])) {

    $id = $_GET['deletePID'];

    // call the function
    $result = delete_product_controller($id);
    echo $id;

    if ($result) {
        echo "<script type='text/javascript'> alert('Successfully deleted Product');
            window.location.href = '../admin/productView.php';
            </script>";
    } else {
        echo "<script type='text/javascript'> alert('Delete Failed');              
        window.history.back();
        </script>";
    }
}





// --------------------------------------------UPDATE PRODUCT------------------------------------------------------

// process product update form
if (isset($_POST["updateProduct"])) {
    $p_id = $_POST["p_id"];
    $product_cat = $_POST['category'];
    $product_brand = $_POST['brand'];
    $product_title = $_POST['pname'];
    $product_price = $_POST['price'];
    $product_desc = $_POST['desc'];
    $product_key = $_POST['keyword'];
    $product_stock = $_POST['stock'];


    $target_dir = "../assets/images/products/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (empty($_FILES["image"]["name"])) {
        echo "Must insert an Image";
    } else {
        $img_size = getimagesize($_FILES["image"]["tmp_name"]);
        if ($img_size == false) {
            echo "The file is not a valid image";
        }
        if ($_FILES["image"]["size"] > 5000000000) {
            echo "Image file is too large";
        }
        if ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        $image_upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        if ($image_upload) {

            $result = update_product_controller($p_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $target_file, $product_key, $product_stock);

            if ($result === true) {
                echo "<script type='text/javascript'> alert('Successfully Updated Product');
                    window.location.href = '../admin/productView.php';
                    </script>";
            } else {
                echo "
                            <script type='text/javascript'>
                                alert('Failed to update product');
                                window.history.back();
                            </script>
                        ";
            }
        } else {
            echo "<script type='text/javascript'> alert('Upload Failed');              
                window.history.back();
                </script>";
        }
    }
}
// --------------------------------------------PRODUCT ENDS------------------------------------------------------





// --------------------------------------------PRODUCT VARIATIONS------------------------------------------------------


// addsize
if (isset($_POST['addSize'])) {
    $product_size = $_POST['size'];

    $check_dup = check_size_duplicates($product_size);
    if ($check_dup) {
        echo "<script>alert('Size already exists'); 
                document.location.href='../admin/variations.php';
            </script>";
    } else {
        $result = add_varied_size_controller($product_size);

        if ($result) {
            echo "<script type='text/javascript'>alert('Size added.');
            window.location.href = '../admin/variations.php';
            </script>";
        } else {
            echo "<script type='text/javascript'> alert('Failed to add');
                window.location.href = '../admin/variations.php';
                </script>";
        }
    }
}


// addcolor
if (isset($_POST['addColor'])) {

    $product_color = $_POST['color'];

    $check_dup = check_color_duplicates($product_color);
    if ($check_dup) {
        echo "<script>alert('Color already exists'); 
                document.location.href='../admin/variations.php';
            </script>";
    } else {
        $result = add_varied_color_controller($product_color);;
        if ($result) {
            echo "<script type='text/javascript'>alert('Color added.');
            window.location.href = '../admin/variations.php';
            </script>";
        } else {
            echo "<script type='text/javascript'> alert('Failed to add.');
                window.location.href = '../admin/variations.php';
                </script>";
        }
    }
}


// addimage
if (isset($_POST['addImage'])) {
    // $product_image = $_POST['image'];
    $target_dir = "../assets/images/products/varied/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $check_dup = check_image_duplicates($target_file);

    if ($check_dup) {
        echo "<script>alert('Image already exists'); 
                document.location.href='../admin/variations.php';
            </script>";
    } else {

        if (empty($_FILES["image"]["name"])) {
            echo "Must insert an Image";
        } else {
            $img_size = getimagesize($_FILES["image"]["tmp_name"]);
            if ($img_size == false) {
                echo "The file is not a valid image";
            }
            if ($_FILES["image"]["size"] > 5000000000) {
                echo "Image file is too large";
            }
            if ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }

            $image_upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            if ($image_upload) {
                $result = add_varied_image_controller($target_file);
                if ($result) {
                    echo "<script type='text/javascript'>alert('Image added.');
                    window.location.href = '../admin/variations.php';
                    </script>";
                } else {
                    echo "<script type='text/javascript'> alert('Failed to add.');
                        window.location.href = '../admin/variations.php';
                        </script>";
                }
            } else {
                echo "<script type='text/javascript'> alert('Upload Failed');              
                    window.history.back();
                    </script>";
            }
        }
    }
}


// add product attributes
if (isset($_POST["addVar"])) {
    $product_id = $_POST["product"];
    $product_size = $_POST['size'];
    $product_color = $_POST['color'];
    $product_image = $_POST['image'];

    // echo $product_id." ".$product_size." ". $product_color ." ".$product_image;
    $result4 = add_varied_product_controller($product_id, $product_size, $product_color, $product_image);
    if ($result4) {
        echo "<script type='text/javascript'> alert('Successfully added attributes');
            window.location.href = '../admin/variations.php';
            </script>";
    } else {
        echo "<script type='text/javascript'> alert('Failed to add attributes');
            window.location.href = '../admin/variations.php';
            </script>";
    }
}
