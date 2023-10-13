<div>
        <!-- show data of hotels with ajax pagination -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Country</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hotels as $hotel)
                <tr>
                    <th scope="row">{{ $hotel->id }}</th>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->address }}</td>
                    <td>{{ $hotel->city }}</td>
                    <td>{{ $hotel->country }}</td>
                    <td>
                        <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-primary">Edit</a>
        
        

</div>
