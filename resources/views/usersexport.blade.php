<table id="example1" class="table table-bordered table-striped">
<tr><th style="text-align:center" colspan="4"><b>Users Data</b></th></tr>
    <tr><th></th></tr>
                  <thead>
                  <tr>
                    <th><b>Name</b></th>
                    <th><b>Email</b></th>
                    <th><b>Phone</b></th>
                    <th><b>Join Date</b></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $o)
                  <tr>
                    <td>{{ $o->name }}</td>
                    <td>{{ $o->email }}</td>
                    <td>{{ $o->phone }}</td>
                    <td>{{ date('M j, Y', strtotime($o->created_at)) }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>