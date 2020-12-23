<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tbody>
        @foreach($orders as $o)
        <tr>
            <td>Order Name </td>
            <td>{{ $o->order_name }}</td>
        </tr>
        <tr>
            <td>Order Type </td>
            <td>{{ $o->order_type }}</td>
        </tr>
        <tr>
            <td>Order Date </td>
            <td>{{ date('F j, Y H:i a', strtotime($o->created_at)) }}</td>
        </tr>
        <tr>
            <td>Payment Type </td>
            <td>{{ $o->payment_type }}</td>
        </tr>
        <tr>
            <td>Order Price </td>
            <td>IDR {{ number_format($o->order_price, 2) }}</td>
        </tr>
        <tr>
            <td>Payment Status </td>
            <td>{{ $o->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>