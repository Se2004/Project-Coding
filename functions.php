
<?php

function pf_validate_number($value, $function, $redirect) {
if(isset($value) == TRUE) {
if(is_numeric($value) == FALSE) {
$error = 1;
}
if(@$error == 1) {
header("Location: " . $redirect);
}
else {
$final = $value;
}
}
else {
if($function == 'redirect') {
header("Location: " . $redirect);
}
if($function == "value") {
$final = 0;
}
}
return $final;
}


function showcart()
{
if(isset($_SESSION['SESS_ORDERNUM']))
{
if(isset($_SESSION['SESS_LOGGEDIN']))
{
$custsql = "SELECT id, status from orders WHERE customer_id = ". $_SESSION['SESS_USERID']. " AND status < 2;";
$custres = mysql_query($custsql)or die(mysql_error());;
$custrow = mysql_fetch_assoc($custres);

$itemssql = "SELECT products.*, orderitems.*,sum(quantity) as quantity, orderitems.id AS itemid FROM products, orderitems WHERE orderitems.product_id =products.id AND order_id = " . $custrow['id']." group by orderitems.product_id having orderitems.product_id = products.id";
$itemsres = mysql_query($itemssql)or die(mysql_error());
$itemnumrows = mysql_num_rows($itemsres);
}
else
{
$custsql = "SELECT id, status from orders WHERE session = '" . session_id(). "' AND status < 2;";
$custres = mysql_query($custsql)or die(mysql_error());;
$custrow = mysql_fetch_assoc($custres);
$itemssql = "SELECT products.*, orderitems.*, sum(quantity) as quantity, orderitems.id AS itemid FROM products, orderitems WHERE order_id = " . $custrow['id']. " group by orderitems.product_id having orderitems.product_id = products.id";
$itemsres = mysql_query($itemssql)or die(mysql_error());
$itemnumrows = mysql_num_rows($itemsres);

}
}
else
{
$itemnumrows = 0;
}
if($itemnumrows == 0)
{
echo "Вы не добавили ничего в свою корзину";
}

else
{
echo "<table cellpadding='10'>";
echo "<tr>";
echo "<td></td>";
echo "<td><strong>Товар</strong></td>";
echo "<td><strong>Количество</strong></td>";
echo "<td><strong>Цена</strong></td>";
echo "<td><strong>Общая цена</strong></td>";
echo "<td></td>";
echo "</tr>";
while($itemsrow = mysql_fetch_assoc($itemsres))
{
$quantitytotal = $itemsrow['price'] * $itemsrow['quantity'];
echo "<tr>";
if(empty($itemsrow['image'])) {
echo "<td><img src='productimages/dummy.jpg' width='50' alt='" . $itemsrow['name'] . "'></td>";
}
else {
echo "<td><img src='productimages/" .$itemsrow['image'] . "' width='50' alt='". $itemsrow['name'] . "'></td>";
}
echo "<td>" . $itemsrow['name'] . "</td>";
echo "<td>" . $itemsrow['quantity'] . "</td>";
echo "<td><strong>₸" . sprintf('%.2f', $itemsrow['price']) . "</strong></td>";
echo "<td><strong>₸". sprintf('%.2f', $quantitytotal) . "</strong></td>";
echo "<td>[<a href='delete.php?id=". $itemsrow['itemid'] . "'>X</a>]</td>";
echo "</tr>";
@$total = $total + $quantitytotal;
$totalsql = "UPDATE orders SET total = ". $total . " WHERE id = ". $_SESSION['SESS_ORDERNUM'];
$totalres = mysql_query($totalsql)or die(mysql_error());;
}
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td>TOTAL</td>";
echo "<td><strong>₸". sprintf('%.2f', $total) . "</strong></td>";
echo "<td></td>";
echo "</tr>";
echo "</table>";

}
}
?>
