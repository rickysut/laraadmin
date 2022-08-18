@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <!--div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
    </div-->

    <div class="card-body">
        <form method="POST" action="{{ route("admin.roles.store") }}" enctype="multipart/form-data">
            @csrf
            <input name="permissions[]" id="idpermissions" type="hidden" >
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Role1">
                    <thead>
                        <tr>
                            <th>
                                {{ trans('cruds.permission.title') }}
                                <div>
                                <span class="btn btn-info btn-xs check-all" style="border-radius: 10">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs decheck-all" style="border-radius: 10">{{ trans('global.deselect_all') }}</span>
                                </div>
                            </th>
                            <th width="20" class="text-center">
                                acess
                            </th>
                            <th width="20" class="text-center">
                                create
                            </th>
                            <th width="20" class="text-center">
                                show
                            </th>
                            <th width="20" class="text-center">
                                edit
                            </th>
                            <th width="20" class="text-center">
                                delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($grpTitle as $id=>$label )
                            @if ($label['is_hidden'] == "0") 
                            <tr>
                                <td>
                                    @if ($label['is_parent'] == "1") 
                                        <strong>{{ $label['title'] }}</strong>
                                    @else
                                        &nbsp;&nbsp;&nbsp;{{ $label['title'] }}
                                    @endif
                                    
                                </td>
                                <td style="padding-left: 44px;">
                                    @if ($label['can_access'] == "1")
                                        
                                            @foreach($permi as $data)
                                                @if (($data->grp_title==$label['title'])&&($data->perm_type ==5))
                                                    <input class="form-check-input check1" type="checkbox"  value="{{ $data->id }}" > 
                                                    @break
                                                @endif
                                            @endforeach
                                            
                                    @endif
                                </td>
                                <td style="padding-left: 44px;">
                                    @if ($label['can_create'] == "1")
                                        
                                            @foreach($permi as $data)
                                                @if (($data->grp_title==$label['title'])&&($data->perm_type ==1))
                                                    <input class="form-check-input check1" type="checkbox"  value="{{ $data->id }}" > 
                                                    @break
                                                @endif
                                            @endforeach
                                            
                                        
                                    @endif
                                </td>
                                <td style="padding-left: 44px;">
                                    @if ($label['can_view'] == "1")
                                        
                                            @foreach($permi as $data)
                                                @if (($data->grp_title==$label['title'])&&($data->perm_type ==3))
                                                    <input class="form-check-input check1" type="checkbox"  value="{{ $data->id }}" > 
                                                    @break
                                                @endif
                                            @endforeach
                                            
                                    @endif
                                </td>
                                <td style="padding-left: 44px;">
                                    @if ($label['can_edit'] == "1")
                                        
                                            @foreach($permi as $data)
                                                @if (($data->grp_title==$label['title'])&&($data->perm_type ==2))
                                                    <input class="form-check-input check1" type="checkbox"  value="{{ $data->id }}" > 
                                                    @break
                                                @endif
                                            @endforeach
                                            
                                    @endif
                                </td>
                                <td style="padding-left: 44px;">
                                    @if ($label['can_delete'] == "1")
                                        
                                            @foreach($permi as $data)
                                                @if (($data->grp_title==$label['title'])&&($data->perm_type ==4))
                                                    <input class="form-check-input check1" type="checkbox"  value="{{ $data->id }}" > 
                                                    @break
                                                @endif
                                            @endforeach
                                            
                                    @endif
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <!--div class="form-group">
                <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
                    @foreach($permissions as $id => $permission)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permission }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
            </div-->
            <div class="form-group">
                <button class="btn btn-success btnsave" >
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.roles.index') }}">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $('.check-all').click(function () {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    })
        
    $('.decheck-all').click(function () {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = false;                        
        });
    })

    $('.btnsave').click(function () {
       
        var values = []
        $(".check1:checkbox:checked").each(function(){
            let nilai = $(this).val();
            values.push(nilai);
        }); 
        $("#idpermissions").val(values[0]);
        for (var i = values.length - 1; i>=1; i--) {
            $("#idpermissions").after(
                "<input name='permissions[]' id='idpermissions' type='hidden' value="+ values[i]+" />"
                
            );
        } 
        
        this.form.submit();
    })

    
</script>
@endsection