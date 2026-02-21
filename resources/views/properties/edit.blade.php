 <h1>Edit Property</h1>

<form action="{{ route('properties.update', $property->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $property->name }}"><br><br>

    <input type="text" name="location" value="{{ $property->location }}"><br><br>

    <input type="number" name="units" value="{{ $property->units }}"><br><br>

    <input type="number" step="0.01" name="rent_amount" value="{{ $property->rent_amount }}"><br><br>

    <button type="submit">Update Property</button>
</form>