<x-dashboard-layout title="Home">
    <section class="section dashboard">
        <div class="row">
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Balance</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-wallet"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $balance }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Income <span>| This Month</span></h5>
                        <div class="d-flex align-items-center">
                            <a href="">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                            </a>
                            <div class="ps-3">
                                <h6>Rp 40.000,00</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Expense <span>| This Month</span></h5>
                        <div class="d-flex align-items-center">
                            <a href="">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                            </a>
                            <div class="ps-3">
                                <h6>Rp. 100.000,00</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- End Customers Card -->

            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Recent Sales</h5>

                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Types</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="#">#1</a></th>
                                    <td>Rp. 100.000,00</td>
                                    <td><a href="#" class="text-primary">Expense</a></td>
                                    <td>15/12/2024</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div><!-- End Recent Sales -->


        </div>
    </section>
</x-dashboard-layout>
