@if(Auth::user()->s_role == "c_admin")
<a class="btn btn-info" href="{{ route('referrals.show',$referral->id) }}"><i class="fa fa-file icon-white" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="btn btn-primary" href="{{ route('referrals.edit',$referral->id) }}"><i class="fa fa-edit icon-white" aria-hidden="true"></i></a>

{!! Form::open(['method' => 'DELETE','route' => ['referrals.destroy', $referral->id],'style'=>'display:inline']) !!}
{!! Form::button('<i class="fa fa-trash icon-white"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  !!}
{!! Form::close() !!}
@else
<p>No Permissions</p>
@endif