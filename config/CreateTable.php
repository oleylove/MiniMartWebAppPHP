<?php

    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "AAAAA";
    
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

    try {
        $employees = "CREATE TABLE tb_employees (
            `emp_id` VARCHAR(13) PRIMARY KEY COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผู้ใช้',
            `pos_id` int(11) NOT NULL COMMENT 'รหัสผ่าน',
            `password` VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
            `name` VARCHAR(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุลผู้ใช้',
            `surname` VARCHAR(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อีเมลผู้ใช้',
            `email` VARCHAR(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อายุผู้ใช้',
            `age` int(11) NOT NULL COMMENT 'เพศผู้ใช้',
            `gender` VARCHAR(4) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ตำแหน่งผู้ใช้',
            `status` VARCHAR(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active' COMMENT 'สถานะผู้ใช้',
            `phone` VARCHAR(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทรผู้ใช้',
            `photo` VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'photo.png' COMMENT 'รูปผู้ใช้',
            `create_at` datetime DEFAULT NULL COMMENT 'บันทัก',
            `update_at` datetime DEFAULT NULL COMMENT 'แก้ไข'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $conn->exec($employees);


        $categories = "CREATE TABLE tb_categories (
            `cat_id` int(11) PRIMARY KEY NOT NULL COMMENT 'รหัสประเภทสินค้า',
            `cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประเภทสินค้า'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $conn->exec($categories);
        

        $positions = "CREATE TABLE tb_positions (
            `pos_id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT 'รหัสตำแหน่ง',
            `pos_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ตำแหน่ง'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $conn->exec($positions);


        $products = "CREATE TABLE tb_products (
            `prod_id` varchar(20) PRIMARY KEY COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสสินค้า',
            `cat_id` int(11) NOT NULL COMMENT 'รหัสประเภทสินค้า',
            `supp_id` int(11) NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ผลิต',
            `name_th` int(200) NOT NULL COMMENT 'ชื่อไทย',
            `name_en` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่ออังกฤษ',
            `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เนื้อหา',
            `size` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ขนาด',
            `fad` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'รหัส อย.' COMMENT 'รหัส อย.',
            `quantity` int(11) NOT NULL COMMENT 'จำนวน',
            `cost` float NOT NULL COMMENT 'ต้นทุน',
            `price` float NOT NULL COMMENT 'ราคาขาย',
            `discount` float NOT NULL DEFAULT 0 COMMENT 'ส่วนลด',
            `photo` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'photo.png' COMMENT 'รูปสินค้า',
            `status` varchar(13) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sell' COMMENT 'สถานะสินค้า',
            `create_at` datetime DEFAULT NULL COMMENT 'บันทัก',
            `update_at` datetime DEFAULT NULL COMMENT 'แก้ไข'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $conn->exec($products);


        $sales = "CREATE TABLE tb_sales (
            `sale_id` varchar(20) PRIMARY KEY COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสการขาย',
            `emp_id` int(11) NOT NULL COMMENT 'รหัสพนักงานขาย',
            `sale_total` float NOT NULL COMMENT 'ยอดรวม',
            `create_at` datetime DEFAULT NULL COMMENT 'บันทัก',
            `update_at` datetime DEFAULT NULL COMMENT 'แก้ไข'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $conn->exec($sales);


        $salesdtl = "CREATE TABLE tb_salesdtl (
            `sdtl_id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL COMMENT 'รหัสรายละเอียดการขาย',
            `sale_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสการขาย',
            `prod_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสสินค้า',
            `sdtl_price` float NOT NULL COMMENT 'ราคาสินค้า',
            `sdtl_qty` int(11) NOT NULL COMMENT 'จำนวนสินค้า',
            `sdtl_discount` float NOT NULL DEFAULT 0 COMMENT 'ส่วนลดสินค้า',
            `sdtl_total` float NOT NULL COMMENT 'ราคารวม',
            `create_at` datetime DEFAULT NULL COMMENT 'บันทัก',
            `update_at` datetime DEFAULT NULL COMMENT 'แก้ไข'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $conn->exec($salesdtl);

        echo "Table created successfully<br>";
        echo ('<a class="nav-link " href="../index.php">HOME</a>');    
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        echo $employees . "<br>" . $e->getMessage();
    }
    $conn = null;
?>