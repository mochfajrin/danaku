<x-dashboard-layout title="Transaction">
    <div class="my-4 w-full">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createForm">
            <i class="bi bi-plus-circle mr-4"></i>
            Add Transaction
        </button>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction History</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Types</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <th scope="row">{{ $transaction->id }}</th>
                            <td>{{ $transaction->getFormatedAmount() }}</td>
                            <td>
                                <span
                                    class="badge rounded-pill {{ $transaction->types == 'income' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $transaction->types }}
                                </span>
                            </td>
                            <td>{{ $transaction->description }}</td>
                            <td>{{ $transaction->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="createForm" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Basic Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="card-title">Input Transaction</h5>
                    <form class="row g-3" action="{{ route('transaction.create') }}" method="post">
                        @csrf
                        <div class="col-12">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" placeholder="Input amount (Rp)" class="form-control" id="amount"
                                name="amount" value="{{ old('amount') }}" required>
                            @error('amount')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date"
                                value="{{ old('date') }}" required>
                            @error('date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="types" class="form-label">Types</label>
                            <select class="form-select" id="types" name="types">
                                <option value="income" {{ old('types') == 'income' ? 'selected' : '' }}>Income</option>
                                <option value="expense" {{ old('types') == 'expense' ? 'selected' : '' }}>Expense
                                </option>
                            </select>
                            @error('types')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="descriptions" name="description" required></textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
