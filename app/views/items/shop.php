<?php require APPROOT . '/views/inc/header.php'; ?>

<section id="shopWindow">
    <div class="d-flex justify-content-center p-5">
        <button class="shopSelect" onclick="sortHighestToLowest()">Price -> Highest to Lowest</button>
        <button class="shopSelect" onclick="sortLowestToHighest()">Price -> Lowest to Highest</button>
    </div>
    <div class=" d-flex flex-wrap justify-content-between" id="productDiv">
    </div>
</section>

<script>
    const productDiv = document.getElementById('productDiv')

    fetchItems();

    function fetchItems() {
        fetch('<?php echo URLROOT . '/items/items/'; ?>')
            .then(resp => resp.json())
            .then(data => {
                getProducts(data);
            });
    }

    function getProducts(itemsArr) {
        productDiv.innerHTML = '';
        itemsArr.map(item => {
            let imageDiv = document.createElement('div')
            imageDiv.setAttribute('id', 'imgDiv')
            imageDiv.classList.add(item.item_id)

            let image = document.createElement('img')
            image.src = item.img1

            let productName = document.createElement('h3')
            productName.setAttribute('id', 'productName')
            productName.innerText = item.title

            let productPrice = document.createElement('p')
            productPrice.setAttribute('id', 'productPrice')
            productPrice.innerText = `$${item.price}.00`

            let arr = [image, productName, productPrice]
            arr.map(el => {
                imageDiv.appendChild(el)
            })

            productDiv.appendChild(imageDiv)

            //PRODUCT HOVER

            imageDiv.addEventListener('mouseover', showSpecs)
            imageDiv.addEventListener('mouseout', hideSpecs)

            function showSpecs() {
                productName.style.color = 'black'
                productPrice.style.color = 'rgb(250, 91, 47)'
            }

            function hideSpecs() {
                productName.style.color = 'rgb(236, 239, 241)'
                productPrice.style.color = 'rgb(236, 239, 241)'
            }

            imageDiv.addEventListener('click', openProduct)
        });
    }

    function openProduct() {
        let id = event.path[1].className;
        window.location.href = `<?php echo URLROOT; ?>/items/item/${id}`;
    }

    function sortLowestToHighest() {
        fetch('<?php echo URLROOT . '/items/ascOrder/'; ?>')
            .then(resp => resp.json())
            .then(data => {
                getProducts(data);
            });
    }

    function sortHighestToLowest() {
        fetch('<?php echo URLROOT . '/items/descOrder/'; ?>')
            .then(resp => resp.json())
            .then(data => {
                getProducts(data);
            });
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>