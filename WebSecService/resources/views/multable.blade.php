<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@php($j = 5)
<div class="card m-4 col-sm-2">	
  <div class="card-header">{{$j}} Multiplication Table</div>
  <div class="card-body">
    <table>
      @foreach (range(1, 10) as $i)
      <tr><td>{{$i}} * {{$j}}</td><td> = {{ $i * $j }}</td></li>    
      @endforeach
    </table>
  </div>
</div>
