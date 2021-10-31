
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <button class="btn btn-primary btn-sm" wire:click="showAddForm"><i class="ti-plus"></i> {{trans('parents.add')}}</button>
                    @error('error')
                    <br>
                    <div class="alert alert-danger">{{ $message }}</div>
                    <br>
                    @enderror
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('main.email')}}</th>
                                <th>{{trans('parents.father_name')}}</th>
                                <th>{{trans('parents.father_job')}}</th>
                                <th>{{trans('parents.father_national_id')}}</th>
                                <th>{{trans('parents.father_passport_id')}}</th>
                                <th>{{trans('parents.father_phone')}}</th>
                                <th>{{trans('parents.father_nationality_id')}}</th>
                                <th>{{trans('parents.father_blood_type_id')}}</th>
                                <th>{{trans('parents.father_religion_id')}}</th>
                                <th>{{trans('parents.father_address')}}</th>
                                <th>{{trans('parents.mother_name')}}</th>
                                <th>{{trans('parents.mother_job')}}</th>
                                <th>{{trans('parents.mother_national_id')}}</th>
                                <th>{{trans('parents.mother_passport_id')}}</th>
                                <th>{{trans('parents.mother_phone')}}</th>
                                <th>{{trans('parents.mother_nationality_id')}}</th>
                                <th>{{trans('parents.mother_blood_type_id')}}</th>
                                <th>{{trans('parents.mother_religion_id')}}</th>
                                <th>{{trans('parents.mother_address')}}</th>
                                <th>{{trans('main.controls')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>
                            @foreach($parents as $parent)
                                <?php $i++ ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$parent->email}}</td>
                                    <td>{{$parent->father_name}}</td>
                                    <td>{{$parent->father_job}}</td>
                                    <td>{{$parent->father_national_id}}</td>
                                    <td>{{$parent->father_passport_id}}</td>
                                    <td>{{$parent->father_phone}}</td>
                                    <td>{{$parent->father_nationality->name}}</td>
                                    <td>{{$parent->father_blood_type->name}}</td>
                                    <td>{{$parent->father_religion->name}}</td>
                                    <td>{{$parent->father_address}}</td>
                                    <td>{{$parent->mother_name}}</td>
                                    <td>{{$parent->mother_job}}</td>
                                    <td>{{$parent->mother_national_id}}</td>
                                    <td>{{$parent->mother_passport_id}}</td>
                                    <td>{{$parent->mother_phone}}</td>
                                    <td>{{$parent->mother_nationality->name}}</td>
                                    <td>{{$parent->mother_blood_type->name}}</td>
                                    <td>{{$parent->mother_religion->name}}</td>
                                    <td>{{$parent->mother_address}}</td>
                                    <td>
                                        <button wire:click="edit({{$parent->id}})" class="btn btn-success btn-sm"><i class="ti-pencil"></i> {{trans('main.edit')}}</button>
                                        <button class="btn btn-danger btn-sm" type="submit" wire:click="delete({{$parent->id}})"><i class="ti-trash"></i> {{trans('main.delete')}}</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{trans('main.email')}}</th>
                                <th>{{trans('parents.father_name')}}</th>
                                <th>{{trans('parents.father_job')}}</th>
                                <th>{{trans('parents.father_national_id')}}</th>
                                <th>{{trans('parents.father_passport_id')}}</th>
                                <th>{{trans('parents.father_phone')}}</th>
                                <th>{{trans('parents.father_nationality_id')}}</th>
                                <th>{{trans('parents.father_blood_type_id')}}</th>
                                <th>{{trans('parents.father_religion_id')}}</th>
                                <th>{{trans('parents.father_address')}}</th>
                                <th>{{trans('parents.mother_name')}}</th>
                                <th>{{trans('parents.mother_job')}}</th>
                                <th>{{trans('parents.mother_national_id')}}</th>
                                <th>{{trans('parents.mother_passport_id')}}</th>
                                <th>{{trans('parents.mother_phone')}}</th>
                                <th>{{trans('parents.mother_nationality_id')}}</th>
                                <th>{{trans('parents.mother_blood_type_id')}}</th>
                                <th>{{trans('parents.mother_religion_id')}}</th>
                                <th>{{trans('parents.mother_address')}}</th>
                                <th>{{trans('main.controls')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
