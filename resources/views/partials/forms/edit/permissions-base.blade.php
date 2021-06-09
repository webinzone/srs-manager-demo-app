@foreach ($permissions as $area => $permissionsArray)
  @if (count($permissionsArray) == 1)
    <?php $localPermission = $permissionsArray[0]; ?>
    <tbody class="permissions-group">
    <tr class="header-row permissions-row">
      <td class="col-md-5 tooltip-base permissions-item"
        data-toggle="tooltip"
        data-placement="right"
        title="{{ $localPermission['note'] }}"
      >
        @unless (empty($localPermission['label']))
         <h2>{{ $area . ': ' . $localPermission['label'] }}</h2>
        @else
          <h2>{{ $area }}</h2>
        @endunless
      </td>

      <td class="col-md-1 permissions-item">
        <label class="sr-only" for="{{ 'permission['.$localPermission['permission'].']' }}">{{ 'permission['.$localPermission['permission'].']' }}</label>
        @if (($localPermission['permission'] == 'superuser') && (!Auth::user()->isSuperUser()))
          {{ Form::radio('permission['.$localPermission['permission'].']', '1',$userPermissions[$localPermission['permission'] ] == '1',['disabled'=>"disabled", 'class'=>'minimal', 'aria-label'=> 'permission['.$localPermission['permission'].']']) }}
        @else
          {{ Form::radio('permission['.$localPermission['permission'].']', '1',$userPermissions[$localPermission['permission'] ] == '1',['value'=>"grant", 'class'=>'minimal',  'aria-label'=> 'permission['.$localPermission['permission'].']']) }}
        @endif
      </td>
      <td class="col-md-1 permissions-item">
        <label class="sr-only" for="{{ 'permission['.$localPermission['permission'].']' }}">{{ 'permission['.$localPermission['permission'].']' }}</label>
        @if (($localPermission['permission'] == 'superuser') && (!Auth::user()->isSuperUser()))
          {{ Form::radio('permission['.$localPermission['permission'].']', '-1',$userPermissions[$localPermission['permission'] ] == '-1',['disabled'=>"disabled", 'class'=>'minimal', 'aria-label'=> 'permission['.$localPermission['permission'].']']) }}
        @else
          {{ Form::radio('permission['.$localPermission['permission'].']', '-1',$userPermissions[$localPermission['permission'] ] == '-1',['value'=>"deny", 'class'=>'minimal',  'aria-label'=> 'permission['.$localPermission['permission'].']']) }}
        @endif
      </td>
      <td class="col-md-1 permissions-item">
        <label class="sr-only" for="{{ 'permission['.$localPermission['permission'].']' }}">{{ 'permission['.$localPermission['permission'].']' }}</label>
        @if (($localPermission['permission'] == 'superuser') && (!Auth::user()->isSuperUser()))
          {{ Form::radio('permission['.$localPermission['permission'].']','0',$userPermissions[$localPermission['permission'] ] == '0',['disabled'=>"disabled",'class'=>'minimal',  'aria-label'=> 'permission['.$localPermission['permission'].']'] ) }}
        @else
          {{ Form::radio('permission['.$localPermission['permission'].']','0',$userPermissions[$localPermission['permission'] ] == '0',['value'=>"inherit", 'class'=>'minimal',  'aria-label'=> 'permission['.$localPermission['permission'].']'] ) }}
        @endif
      </td>
    </tr>
  </tbody>

  @else <!-- count($permissionsArray) == 1-->
 
  @endif
@endforeach
