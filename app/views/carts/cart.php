<?php require APPROOT . '/views/inc/header.php'; ?>

<section id="cartWindow" class="d-flex flex-column align-items-center">
    <h2 id="cartHeader">YOUR CART</h2>

    <div id="allCards" class="allCards d-flex flex-wrap justify-content-center"></div>

    <div class="d-flex justify-content-between align-items-center cartBtn">
        <div><a href="<?php echo URLROOT; ?>" class="btn btn-dark btn-block" id="backToShop">BACK TO STORE</a></div>
        <div class="p-2">Total: $0.00</div>
        <div><button class="btn btn-dark btn-block">CHECKOUT</button></div>
    </div>
</section>


<?php require APPROOT . '/views/inc/footer.php'; ?>