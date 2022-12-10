    <div class="row mb-5 mt-5 g-3">
        <div class="col-md-6">
            <div class="col-sm  row-cols-2 card-counter p-5 bg-light border">
                <em class="fa fa-user display-3" class="card-text"></em>
                <h1 class="display-3 count-numbers"><?= count($clients); ?></h1>
                <p class="display-6 count-name">Number of clients</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="col-sm row-cols-2 card-counter p-5 bg-light border">
                <em class="fa fa-user display-3"></em>
                <h1 class="display-3 count-numbers"><?= count($orders); ?></h1>
                <p class="display-6 count-name">Number of orders</p>
            </div>
        </div>
    </div>