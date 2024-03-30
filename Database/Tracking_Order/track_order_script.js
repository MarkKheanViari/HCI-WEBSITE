function searchOrder() {
var input = document.getElementById("search").value;
var table = document.getElementById("table");
var rows = table.rows;
var found = false;
for (var i = 1; i < rows.length; i++) {
    var cells = rows[i].cells;
    var orderId = cells[0].innerHTML;
    if (orderId == input) {
    found = true;
    alert("Order ID: " + orderId + "\nProduct Name: " + cells[1].innerHTML + "\nQuantity: " + cells[2].innerHTML + "\nPrice: " + cells[3].innerHTML + "\nStatus: " + cells[4].innerHTML + "\nAddress: " + cells[5].innerHTML + "\nSOT Number: " + cells[6].innerHTML);
    break;
    }
}
if (!found) {
    alert("No order found with this tracking number.");
}
}