function changePrice(e) {
    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').attributes['content'].value;

    let input = e.parentNode.querySelector('input.my-product-input');
    let price = e.parentNode.querySelector('input.my-product-input').value;
    let productId = e.parentNode.querySelector('input.my-product-input').dataset.productid;

    let formData = new FormData();
    formData.append('price', price);
    formData.append('productId', productId);

   fetch('/products/price/update', {
       headers: {
           'X-CSRF-TOKEN': CSRF_TOKEN,
       },
        method: 'POST',
        body: formData,
    }).then(function(data) {
        return data.json()  ;
    }).then(function(data) {
        console.log(data.response);
    }).catch((error) => {
           console.error('Error:', error);
    });

}