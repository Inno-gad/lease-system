 <h1>Properties</h1>

<a href="{{ route('properties.create') }}">Create Property</a>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Units</th>
        <th>Rent</th>
    </tr>

    @foreach($properties as $property)
    <tr>
        <td>{{ $property->name }}</td>
        <td>{{ $property->location }}</td>
        <td>{{ $property->units }}</td>
        <td>{{ $property->rent_amount }}</td>
        <td>
    <a href="{{ route('properties.edit', $property->id) }}">Edit</a>
</td>
    </tr>
    @endforeach
</table>