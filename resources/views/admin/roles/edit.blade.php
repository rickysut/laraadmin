@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Role1">
            <thead>
                <tr>
                    <th>
                        {{ trans('cruds.permission.title') }}
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
                    
                    <tr>
                        <td>
                            @if ($label['is_parent'] == "1") 
                                <strong>{{ $label['title'] }} 
                                    @foreach($permi as $id => $permission)
                                        @if ($role->permissions->contains($id))
                                            {{ $permission }}
                                            @break
                                        @endif

                                    @endforeach
                                </strong>
                            @else
                                &nbsp;&nbsp;&nbsp;{{ $label['title'] }}
                            @endif
                            
                        </td>
                        <td style="padding-left: 44px;">
                            @if ($label['can_access'] == "1")
                                <input class="form-check-input" type="checkbox" id="switch1">    
                            @endif
                        </td>
                        <td style="padding-left: 44px;">
                            @if ($label['can_create'] == "1")
                                <input class="form-check-input" type="checkbox" id="switch2">
                            @endif
                        </td>
                        <td style="padding-left: 44px;">
                            @if ($label['can_view'] == "1")
                                <input class="form-check-input" type="checkbox" id="switch3">
                            @endif
                        </td>
                        <td style="padding-left: 44px;">
                            @if ($label['can_edit'] == "1")
                                <input class="form-check-input" type="checkbox" id="switch4">
                            @endif
                        </td>
                        <td style="padding-left: 44px;">
                            @if ($label['can_delete'] == "1")
                                <input class="form-check-input" type="checkbox" id="switch5">
                            @endif
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    
    <div class="card-body">
        <form method="POST" action="{{ route("admin.roles.update", [$role->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $role->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
                    @foreach($permissions as $id => $permission)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permission }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
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