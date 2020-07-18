@extends('layouts.app')
@push('scripts')
    <script>
        $(document).ready(function () {
            //getContact(1);
            document.cookie="group_id=1";
        });

        function getContact(group) {
            $.ajax({
                url: "{{ url('/get') }}/" + group + "/contact",
                context: document.body
            }).done(function (result) {
                groups = JSON.parse(result);
                var view = '';
                var  group_id='';
                i = 1;
                groups.forEach(function (contact) {
                    view += '<tr>\
                        <th scope="row">' + i++ + '</th>\
                        <td>' + contact.name + '</td>\
                        <td>' + contact.phone + '</td>\
                        <td>' + contact.address + '</td>\
                        <td> <a href="" class="btn btn-success" onclick="editContact('+contact.id+','+group+')" data-toggle="modal" data-target="#editContact">\
                                 <span class="mr-2 icon-edit"></span>\
                            </a>\
                        <a href="{{url('/delete/contact/')}}/'+contact.id+'" onclick="if(!confirm(\'Вы действительно хотите удалить?\')) return false;" class="btn btn-danger">\
                                 <span class="mr-2 icon-delete"></span>\
                            </a>\
                        </td>\
                        </tr>';
                });
                group_id+='<input type="hidden" name="group" value="'+group+'">';
                $('#contact_group').html(group_id);
                $('#contacts').html(view);
            });

        }

        function editContact(contact_id , group) {
            $.ajax({
                url: "{{ url('/get') }}/contact/" + contact_id,
                context: document.body
            }).done(function (result) {
                groups = JSON.parse(result);
                var view = '';
                i = 1;
                document.cookie="group_id="+group;
                groups.forEach(function (contact) {
                    view += '<div class="modal fade" id="editContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">\
        <div class="modal-dialog" role="document">\
            <div class="modal-content">\
                <div class="modal-header">\
                    <h5 class="modal-title" id="exampleModalLabel">Редактировать контакт</h5>\
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">\
                        <span aria-hidden="false">&times;</span>\
                    </button>\
                </div>\
                <form method="POST" action="{{url('/edit/contact/')}}/'+contact_id+'" class="p-4 border rounded">\
                    @csrf\
                    <div class="modal-body">\
                        <div class="row form-group">\
                        <div class="col-md-12 mb-3 mb-md-0">\
                           <label class="text-black has-feedback" for="name">Выберите Группу</label>\
                           <select class="form-control" name="group" id="group">\
                               @foreach($groups as $group)\
                                    <option value="{{$group->id}}" {{$group->id==$_COOKIE['group_id']?'selected':''}}>{{$group->name}}</option>\
                               @endforeach\
                           </select>\
                        </div>\
                        <div class="col-md-12 mb-3 mb-md-0">\
                            <label class="text-black has-feedback" for="name">ФИО</label>\
                            <input type="text" name="name" value="'+contact.name+'" class="form-control" placeholder="ФИО">\
                        </div>\
                        <div class="col-md-12 mb-3 mb-md-0">\
                            <label class="text-black has-feedback" for="phone">Телефон</label>\
                            <input type="text" name="phone" value="'+contact.phone+'" class="form-control" placeholder="Телефон">\
                        </div>\
                        <div class="col-md-12 mb-3 mb-md-0">\
                            <label class="text-black has-feedback" for="address">Адрес</label>\
                            <input type="text" name="address" value="'+contact.address+'" class="form-control" placeholder="Адрес">\
                        </div>\
                        </div>\
                         <div class="modal-footer">\
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>\
                                 <button type="submit" class="btn btn-primary">Сохранить</button>\
                             </div>\
                         </div>\
                </form>\
            </div>\
        </div>\
        </div>\
    </div>';
                });
                $('#editContactModal').html(view);
                $('#editContact').modal('show');
        });

        }

        function editGroup(group_id) {

            $.ajax({
                url: "{{ url('/get') }}/group/"+group_id,
                context: document.body
            }).done(function (result) {
                groups = JSON.parse(result);
                var view = '';
                var group='<input type="hidden" name="my_group"  value="'+group_id+'">';
                groups.forEach(function (group) {
                    view += '<input type="text"  name="group" value="'+group.name+'" class="form-control">'
                });

                $('#my_group').html(group);
                $('#group_name').html(view);
            });

        }

    </script>
@endpush

@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('assets/images/hero_1.jpg');"
             id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Мои контакты</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Главная</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Мои контакты</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section block__18514" id="next-section">
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('danger'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-3 mr-auto">
                    <div class="border p-4 rounded">
                        <ul class="list-unstyled block__47528 mb-0">
                            <li><span class="active">Группы</span></li>
                            @foreach($groups as $group)
                                <li>
                                    <a href="#" style="float: left;margin-right: 25px" onclick="getContact('{{$group->id}}')">{{$group->name}}</a>
                                    <a href="#" onclick="editGroup('{{$group->id}}')" style="color: blue;float: left;margin-right: 5px" data-toggle="modal" data-target="#editGroup"><i class="mr-2 icon-edit"></i></a>
                                    <a href="{{url('delete/group/'.$group->id)}}"  onclick="if(!confirm('Вы действительно хотите удалить?')) return false;" style="color: red;float: left"><i class="mr-2 icon-delete"></i></a>
                                </li>
                            @endforeach
                            <li>
                                 <a href="#" class="btn btn-success border-width-2 d-none d-lg-inline-block" data-toggle="modal" data-target="#addGroup">
                                     <span class="mr-2 icon-add"></span>Добавить Группу
                                 </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- SEARCH FORM -->
                    <form class="form-inline"   style="float: right; margin-bottom: 15px;">
                        <div class="input-group input-group-sm">
                            <input class="form-control" type="text" name="search" value="{{old('search')}}" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">
                                    <i class="mr-2 icon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ФИО</th>
                            <th scope="col">Номер телефона</th>
                            <th scope="col">Адресс</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody id="contacts">
                        @foreach($contacts as  $kay=>$contact)
                            @foreach($contact->contacts as $cont)
                        <tr>
                            <td>{{$cont->name}}</td>
                            <td>{{$cont->phone}}</td>
                            <td>{{$cont->address}}</td>
                            <td> <a href="" class="btn btn-success" onclick="editContact('{{$cont->id}}','{{$contact->id}}')" data-toggle="modal" data-target="#editContact">
                                    <span class="mr-2 icon-edit"></span>
                                </a>
                                <a href="{{url('/delete/contact/'.$cont->id)}}" onclick="if(!confirm('Вы действительно хотите удалить?')) return false;" class="btn btn-danger">
                                    <span class="mr-2 icon-delete"></span>
                                </a>
                            </td>
                        </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                    <a href="" class="btn btn-success border-width-2 d-none d-lg-inline-block" data-toggle="modal" data-target="#addContact">
                        <span class="mr-2 icon-add"></span>Добавить Контакт
                    </a>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="addGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить группу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('/add/group')}}" class="p-4 border rounded">
                    @csrf
                <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <input type="text" id="group" name="group" value="{{old('group')}}" class="form-control" placeholder="Введите названия группы">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Редактировать группу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('/edit/group')}}" class="p-4 border rounded">
                    @csrf
                <div class="modal-body">
                    <div id="my_group"></div>
                    <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0" id="group_name">

                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить Контакты</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('/add/contact')}}" class="p-4 border rounded">
                    @csrf
                    <div id="contact_group"></div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black has-feedback" for="name">ФИО</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="ФИО">
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black has-feedback" for="phone">Телефон</label>
                                <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Телефон">
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black has-feedback" for="address">Адрес</label>
                                <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Адрес">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   <div id="editContactModal"></div>
@endsection
