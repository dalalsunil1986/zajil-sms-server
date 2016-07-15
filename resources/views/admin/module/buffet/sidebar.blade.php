<div class="list-group list-group-alternate">
    <a class="list-group-item {{ $active == 'buffet' ? 'active' : '' }}"  href="{{ action('Admin\BuffetController@show',$record->id) }}" ><i class="fa fa-inbox"></i>&nbsp;Info</a>
    <a class="list-group-item {{ $active == 'packages' ? 'active' : '' }}" href="{{ action('Admin\BuffetController@getPackages',['buffetID'=>$record->id])  }}" ><i class="fa fa-exchange"></i>&nbsp;Packages</a>
</div>