<table class="table table-bordered table-striped">
    <tr><th style="text-align:center" colspan="7"><b>Orders Success Data</b></th></tr>
    <tr><th></th></tr>
                  <thead>
                  <tr>
                    <th><b>No</b></th>
                    <th><b>Order Name</b></th>
                    <th><b>Orders Type</b></th>
                    <th><b>Date</b></th>
                    <th><b>Payment</b></th>
                    <th><b>Price</b></th>
                    <th><b>Status</b></th>
                  </tr>
                  </thead>
                  <tbody>
                  @php $no = 1 @endphp
                  @foreach($revenue as $o)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $o->order_name }}</td>
                    <td>{{ $o->order_type }}</td>
                    <td>{{ date('M j, Y h:i a', strtotime($o->created_at)) }}</td>
                    <td>{{ $o->payment_type }}</td>
                    <td>IDR {{ number_format($o->order_price, 2) }}</td>
                    <td>{{ $o->status }}</td>
                  </tr>
                  @endforeach
                  </tbody>
</table>