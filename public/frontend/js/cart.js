
function AddCart(id) {
    $.ajax({
        url: '/product/AddCart/' + id,
        type: 'GET',

    }).done(function(response) {
        // console.log(response); 
        RenderCart(response);
        alertify.success('Đã Thêm Sản Phẩm');
    });
}
$("#data-cart").on("click", ".si-close i", function() {
    $.ajax({
        url: '/product/Delete-Item-Cart/' + $(this).data("id"),
        type: 'GET',
    }).done(function(response) {
        RenderCart(response);
        alertify.success('Đã xóa sản phẩm');
    });
});

function RenderCart(response) {
    $("#data-cart").empty();
    $("#data-cart").html(response);
    $("#total-quantity-show").text($("#total-quantity-cart").val());
    // console.log($("#total-quantity-cart").val());
}
