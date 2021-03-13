<?php require APPROOT . '/views/inc/header.php'; ?>

<section id="productWindow">
    <div class="d-flex">
        <div class="firstHalf">
            <img src="<?php echo $data["itemInfo"]->img1; ?>" id="firstImg">
            <div class="d-flex justify-content-center">
                <img src="<?php echo $data["itemInfo"]->img1; ?>" class="smallImg m-3">
                <img src="<?php echo $data["itemInfo"]->img2; ?>" class="smallImg m-3" id="2">
                <img src="<?php echo $data["itemInfo"]->img3; ?>" class="smallImg m-3" id="3">
                <img src="<?php echo $data["itemInfo"]->img4; ?>" class="smallImg m-3">
            </div>
        </div>

        <div id="midName">
            <h3><strong><?php echo $data["itemInfo"]->title; ?></strong></h3>
            <p><strong>$<?php echo $data["itemInfo"]->price; ?>.00</strong></p>
        </div>

        <div class="secondHalf d-flex justify-content-center flex-column">
            <p><?php echo $data["itemInfo"]->description; ?></p>
            <p><strong>Stock: <?php echo $data["itemInfo"]->stock; ?></strong></p>
            <form method="POST">
                <button class="btn btn-dark btn-block" type="submit" name="addBtn" value="add">ADD TO CART</button>
                <input hidden name="item_id" value="<?php echo $data["itemInfo"]->item_id; ?>">
            </form>
        </div>

        <div><i class="fas fa-th m-4 shop" onclick="goBackToShop();"></i></div>
    </div>
</section>

<script>
    function changeImg() {
        document.querySelectorAll('.smallImg').forEach(item => {
            item.addEventListener('click', event => {
                firstImg.src = event.path[0].currentSrc
                item.id == 2 || item.id == 3 ? firstImg.style.objectFit = 'contain' : firstImg.style.objectFit = 'cover'
            })
        });
    }
    changeImg();

    function goBackToShop() {
        window.location.href = `<?php echo URLROOT; ?>/items/shop`;
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>