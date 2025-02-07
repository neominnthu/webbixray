<h1>Your Wallet</h1>

<p>Balance: ${{ number_format($wallet->balance, 2) }}</p>

<form method="POST" action="{{ route('wallet.deposit') }}">
    @csrf
    <label for="amount">Deposit Amount</label>
    <input type="number" name="amount" required>
    <button type="submit">Deposit</button>
</form>

<form method="POST" action="{{ route('wallet.withdraw') }}">
    @csrf
    <label for="amount">Withdraw Amount</label>
    <input type="number" name="amount" required>
    <button type="submit">Withdraw</button>
</form>
