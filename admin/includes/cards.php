    <div class="row mb-5 mt-5">
        <div class="col-sm card p-5 bg-danger">
            <div>
                <em class="fa fa-user" class="card-text"></em>
            </div>
            <div>
                <h1 class="h1 card-text"><?= count($clients); ?></h1>
                <p class="card-text">Number of clients</p>
            </div>
        </div>

        <div class="col-sm card p-5 bg-warning">
            <div>
                <em class="fa fa-user"></em>
            </div>
            <div>
                <h1 class="h1 card-text"><?= count($orders); ?></h1>
                <p class="card-text">Number of orders</p>
            </div>
        </div>
    </div>