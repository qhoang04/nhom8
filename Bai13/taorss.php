<?php
header("Content-type: text/xml");

// Database connection
$conn = mysqli_connect("localhost", "root", "", "taorss", 4306);

if (!$conn) {
    die("Khong the ket noi CSDL: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

// Query the database
$query = "SELECT * FROM news";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Initialize the XML content
$xml = '<?xml version="1.0" ?>';
$xml .= '<rss version="2.0">';
$xml .= '<channel>';
$xml .= '<title>Học Web | Học làm web pro</title>';
$xml .= '<link>http://hocweb.com.vn</link>';
$xml .= '<description>Website hocweb.com.vn được hình thành từ ý tưởng giúp các em sinh viên trường đại học công nghiệp thực phẩm có 1 nơi học tập thực tế gắn với nhu cầu doanh nghiệp từ đó lan rộng ra mô hình học tập thực tế cùng doanh nghiệp cho các sinh viên trong các tỉnh thành</description>';

// Loop through the database results and generate XML
while ($row = mysqli_fetch_array($result)) {
    $xml .= '<item>';
    $xml .= '<title>' . htmlspecialchars($row['title']) . '</title>';
    $xml .= '<link>' . htmlspecialchars($row['link']) . '</link>';
    $xml .= '<description>' . htmlspecialchars($row['description']) . '</description>';
    $xml .= '</item>';
}

$xml .= '</channel>';
$xml .= '</rss>';

// Output the XML
echo $xml;

// Close the database connection
mysqli_close($conn);
?>
