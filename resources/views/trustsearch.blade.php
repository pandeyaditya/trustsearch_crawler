@extends('formlayout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">      
      <h3> Shops Found : <?php echo count($data['shops']) ?></h3><br/>
      @foreach($data['shops'] as $shop)
        <div style="border-bottom: 1px dotted #ececec;margin-bottom:10px;">
          <p><strong>Name : </strong>{{ $shop->name }} </p>
          <p><strong>Market :  </strong>{{ $shop->targetMarketISO3 }} </p>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection