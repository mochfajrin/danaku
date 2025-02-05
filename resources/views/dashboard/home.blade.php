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
                                <h6>{{ Auth::user()->wallet->getFormattedBalance() }}</h6>
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
                                <h6>{{ $income }}
                                </h6>
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
                                <h6>{{ $expense }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                @foreach ($latestTransactions as $transaction)
                                    <tr>
                                        <th scope="row"><a href="#">#{{ $transaction->id }}</a></th>
                                        <td>{{ $transaction->getFormattedAmount() }}</td>
                                        <td><span
                                                class="badge rounded-pill {{ $transaction->types == 'income' ? 'bg-success' : 'bg-danger' }}">
                                                {{ $transaction->types }}
                                            </span>
                                        </td>
                                        <td>{{ $transaction->getDate() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-dashboard-layout>
