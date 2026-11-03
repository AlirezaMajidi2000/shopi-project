const params = new URLSearchParams(location.search)
const slug = params.get('slug')
const productDetail = document.getElementById('productDetail')

let product = products.find(function(p){
    return p.slug === slug
})

productDetail.innerHTML = `

<img src="${product.image}">
<div class="title">${product.title}</div>
<div class="price">${product.price} تومان</div>
<div class="description">${product.description}</div>

`