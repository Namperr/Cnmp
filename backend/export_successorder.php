<?php
include "connect.php"; 

// Function to filter Excel data
function filterData(&$str){ 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, ',')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}

// Excel file name for download 
$fileName = "Donhangthanhcong" . date('Y-m-d') . ".csv"; // Sử dụng định dạng CSV

// Column names 
$fields = array('Họ và tên', 'Địa chỉ', 'Số điện thoại', 'Email','Tên sản phẩm','Số lượng','Giá tiền sản phẩm','Ngày mua'); 

// Display column names as first row 
$excelData = implode(",", array_values($fields)) . "\n"; // Sử dụng dấu phẩy để phân tách các cột

// Fetch records from database 
$currentMonth = date('m');
$query = $conn->query("
    SELECT cd.hoten, cd.diachi, cd.sodienthoai, cd.gmail, tk.name, tk.soluong, tk.price, tk.ngaymua 
    FROM chitietnguoidung cd
    INNER JOIN thongke tk ON cd.id = tk.idnguoimua
    WHERE MONTH(tk.ngaymua) = $currentMonth
"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){
        $lineData = array(
            $row['hoten'], $row['diachi'], $row['sodienthoai'], 
            $row['gmail'], $row['name'], $row['soluong'],$row['price'], $row['ngaymua']
        ); 
        array_walk($lineData, 'filterData');
        $excelData .= implode(",", array_values($lineData)) . "\n"; // Sử dụng dấu phẩy để phân tách giữa các giá trị
    } 
}else{ 
    $excelData .= 'Không tìm thấy bản ghi...'. "\n"; 
} 

// Add UTF-8 BOM
$excelData = "\xEF\xBB\xBF" . $excelData;

// Headers for download 
header("Content-Type: text/csv; charset=UTF-8");
header("Content-Disposition: attachment; filename=\"$fileName\""); 

// Render excel data 
echo $excelData; 

exit();
?>
