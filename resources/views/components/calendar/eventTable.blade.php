<table class="table table-bordered shadow" style="table-layout:fixed;width:100%;">
    <thead>
        <tr>
            <th>Title:</th>
            <th>description:</th>
            <th>timeBlock:</th>
            <th>color:</th>
        </tr>
    </thead>
    <tbody> 
        @foreach ($events as $event)
        <tr>
            <td> {{ $event->eventTitle }}</td>
            <td> {{ $event->description }}</td>
            <td> {{ $event->presetCategory }}</td>





            <td> {{ $event->color }}</td>
        </tr>
        @endforeach
    </tbody>
</table>