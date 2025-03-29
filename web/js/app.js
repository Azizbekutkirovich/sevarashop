if (document.URL == 'http://localhost:8080/sevarashop/') {
	$('#home_li').addClass('active');
} else if (document.URL == 'http://localhost:8080/sevarashop/main/index') {
	$('#home_li').addClass('active');
} else if (document.URL == 'http://localhost:8080/sevarashop/main/products') {
	$('#products_li').addClass('active');
} else if (document.URL == 'http://localhost:8080/sevarashop/main/about') {
	$('#about_li').addClass('active');
}


$('#cart').click(function(){
	let count = $('#count').val();
	window.location.href = "http://localhost/sevarashop/cart/add-cart?product_id=" + id + "&count=" + count;
})