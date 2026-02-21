 <h1>Create Property</h1>

<form action="{{ route('properties.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Property Name"><br><br>
    <input type="text" name="location" placeholder="Location"><br><br>
    <input type="number" name="units" placeholder="Units"><br><br>
    <input type="number" step="0.01" name="rent_amount" placeholder="Rent Amount"><br><br>

    <button type="submit">Save</button>
</form>