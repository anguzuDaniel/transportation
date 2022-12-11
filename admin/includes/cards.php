    <div class="row mb-5 mt-5 g-3">
        <div class="col-md-6">
            <div class="col-sm  row-cols-2 card-counter p-5 bg-danger admin-card">
                <em class="fa fa-user display-3 text-light" class="card-text"></em>

                <div class="col-sm">
                    <p class="display-6 count-name text-light"><?= count($clients) === 1 ? "Client" : "Number of clients"; ?></p>
                    <h1 class="display-3 count-numbers text-light"><?= count($clients); ?></h1>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="col-sm row-cols-2 card-counter p-5 bg-success admin-card">
                <em class="fa fa-user display-3 text-light"></em>

                <div class="col-sm">
                    <p class="display-6 count-name text-light"><?= count($orders) === 1 ? "Order" : "Number of orders"; ?></p>
                    <h1 class="display-3 count-numbers text-light"><?= count($orders); ?></h1>
                </div>
            </div>
        </div>
    </div>